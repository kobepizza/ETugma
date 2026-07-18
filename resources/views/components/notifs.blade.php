<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
        <symbol id="msg" viewBox="0 -960 960 960">
            <title>message</title>
            <path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
        </symbol>
        <symbol id="notif" viewBox="0 -960 960 960">
            <title>notifications</title>
            <path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z" />
        </symbol>
        <symbol id="announce" viewBox="0 -960 960 960">
            <title>announcement</title>
            <path d="M720-440v-80h160v80H720Zm48 280-128-96 48-64 128 96-48 64Zm-80-480-48-64 128-96 48 64-128 96ZM200-200v-160h-40q-33 0-56.5-23.5T80-440v-80q0-33 23.5-56.5T160-600h160l200-120v480L320-360h-40v160h-80Zm240-182v-196l-98 58H160v80h182l98 58Zm120 36v-268q27 24 43.5 58.5T620-480q0 41-16.5 75.5T560-346ZM300-480Z" />
        </symbol>
    </svg>
</head>

<body>
    <form action="">
        <input type="hidden" id="userid" value="{{ session('loginId') }}">
        <input type="hidden" id="usertype" value="{{ session('user_profiles')->user_type_id }}">
    </form>
    <div class="toast-container position-fixed top-0 end-0 p-3" id="toastContainer">
        <!--APPEND NOTIFICATIONS-->
    </div>
</body>

<script>
    //MASTER FILE
    //pusher, toast, appending new notification
    $(document).ready(function() {
        var userID = $('#userid').val();
        var userType = $('#usertype').val();
        console.log('Notifications Ready', 'userType:', userType);

        const notifTypeStrings = {
            1: 'Notifications',
            2: 'Messages',
            3: 'Announcements'
        };
        const notifTypeIcons = {
            1: 'notif',
            2: 'msg',
            3: 'announce'
        };

        var PrivateChannelName = 'user-notification-' + userID;
        var PublicChannelName = 'user-type-' + userType;

        var PrivateChannel = pusher.subscribe(PrivateChannelName);
        var PublicChannel = pusher.subscribe(PublicChannelName);

        console.log('Subscribed to channel:', PrivateChannelName, '&', PublicChannelName);

        PrivateChannel.bind('notifications', function(data) {
            console.log('Received notification:', data);
            if (data.user_id == userID) {
                displayToast(data);
            } else {
                alert('Cannot retrieve notification');
            }
        });

        PublicChannel.bind('notifications', function(data) {
            console.log('Received Announcement',data);
            if (data.user_type == userType) {
                displayToast(data);
            } else {
                alert('Cannot retrieve notification');
            }
        });

        // Common function to display toast
        function displayToast(data) {
            var toastContainer = $('#toastContainer');
            toastContainer.html(''); // Clear the container using jQuery

            let messageTime = new Date(data.time).toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit'
            });
            let notifType = data.type;

            var toastHTML = `
                <div class="toast shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header gap-1">
                        <svg height="20" width="20" fill="currentcolor">
                            <use xlink:href="#${notifTypeIcons[notifType]}" />
                        </svg>
                        <strong class="me-auto">${notifTypeStrings[notifType]}</strong>
                        <small>${messageTime}</small> <!-- time -->
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body text-capitalize text-black text-truncate">
                        ${data.title}
                    </div>
                </div>
            `;

            // Append the toast HTML to the container
            toastContainer.append(toastHTML);

            // Get the newly inserted toast element and show it
            var newToast = toastContainer.children('.toast').last()[0]; // Access the actual DOM element
            var toast = new bootstrap.Toast(newToast);
            toast.show();

            // Hide the toast after 5 seconds
            setTimeout(function() {
                toast.hide();
            }, 5000);
        }

    });
</script>
<style>
    .toast {
        transition: all 0.3s ease-in-out;
    }
</style>