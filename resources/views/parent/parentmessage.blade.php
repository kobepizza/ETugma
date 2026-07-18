@extends('layouts.clientmaster')
@section('content')

@php
$page= "Messages";
@endphp
<html>

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="search" viewBox="0 -960 960 960">
            <title>search</title>
            <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
        </symbol>
        <symbol id="send" viewBox="0 -960 960 960">
            <title>send</title>
            <path d="M120-160v-640l760 320-760 320Zm80-120 474-200-474-200v140l240 60-240 60v140Zm0 0v-400 400Z" />
        </symbol>
        <symbol id="menu" viewBox="0 -960 960 960">
            <title>menu</title>
            <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
        </symbol>
        <symbol id="close" viewBox="0 -960 960 960">
            <title>close</title>
            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
        </symbol>
    </svg>
</head>

<body>
    <main class="content px-2 py-2">
        <div class="container-fluid">
            <div class="row w-100">
                <!--contacts-->
                <div class="col-12 col-md-5">
                    <div class="card collapsed shadow rounded-4 mt-2" id="chats">
                        <div class="hstack justify-content-between align-items-center w-100 p-3" style="height:70px">
                            <h3 class="fw-bold">Chats</h3>
                            <button class="btn d-md-none" data-bs-target="#contactBody" data-bs-toggle="collapse" id="collapseBtn">
                                <svg class="collapse-icon" width="30" height="30" fill="currentcolor">
                                    <use xlink:href="#menu" />
                                </svg>
                            </button>
                        </div>
                        <div class="contacts collapse p-3" id="contactBody" data-bs-parent="#chats">
                            <div class="input-group mb-3">
                                <span class="input-group-text border-end-0 rounded-start-5 px-2 bg-secondary-subtle">
                                    <svg class="search-icon" height="25" width="25" fill="currentcolor">
                                        <use xlink:href="#search" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control border-start-0 bg-secondary-subtle rounded-end-5 px-1" placeholder="Search chats" role="search" id="chatSearch">
                                <button class="btn bg-secondary-subtle rounded-end-5 d-none" type="button" id="ClearSearch">
                                    <svg class="close-icon" height="25" width="25" fill="currentcolor">
                                        <use xlink:href="#close" />
                                    </svg>
                                </button>
                            </div>
                            <div>
                                <div class="d-flex justify-content-center d-none" id="contactLoad">
                                    <div class="spinner-border text-secondary text-center" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <div class="list-group gap-1 p-2" id="contactList">
                                    <!--APPEND CONTACTS-->
                                </div>
                                <h5 class="p-3 text-center d-none" id="searchError">No contacts found.</h5>
                                <h5 class="p-3 text-center d-none" id="noContact">No contacts yet.</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of contacts-->
                <!--messages-->
                <div class="col-12 col-md-7">
                    <div class="card shadow rounded-4 mt-2 px-2" id="msg">
                        <div class="card-header message-header bg-white border-0 rounded-4 p-3 mb-5" style="height:70px;">
                            <div class="hstack gap-2 d-flex align-items-center p-3" style="height:100px">
                                <!--APPEND-->
                                <div class="profile-pic">
                                    <img src="" id="chatmateIMG" alt="" width="60" height="60" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='Images/default-profile.png';"> <!--parent profile picture-->
                                    <div class="status status-active d-none"></div>
                                </div>
                                <div class="">
                                    <h4 id="chatmateNAME" class="text-capitalize mb-0"></h4> <!--chatmate full name-->
                                </div>
                                <!--end of append-->
                            </div>
                        </div>
                        <div class="card-body message-container" id="messages">
                            <span class="w-100 h-100 text-center p-5 m-5" id="noChats">
                                <h5>No chats selected</h5>
                            </span>
                            <div class="d-flex justify-content-center d-none" id="chatLoad">
                                <div class="spinner-border text-secondary text-center" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            <!--APPEND MESSAGES HERE-->
                            <!--END OF MESSAGES-->
                        </div>
                        <div class="reply-container py-3 d-flex align-items-center gap-1">
                            <div class="reply-textbox" aria-placeholder="Aa" contenteditable="true" role="textbox" spellcheck="false" tabindex="0" id="replyBox"></div>
                            <form class="p-0 mb-0" action="" method="POST" id="messageForm">
                                @csrf
                                <input type="hidden" value="" name="message" id="messageReply">
                                <input type="hidden" value="" name="receiver_id" id="tutorID">
                                <input type="hidden" value="{{session('loginId')}}" name="parent_id" id="parent_id">

                                <button type="submit" class="btn d-flex align-items-center rounded-3 reply-btn" id="replyBtn">
                                    <svg class="send-icon" height="30" width="30" fill="black">
                                        <use xlink:href="#send" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end of messages-->
        </div>
        </div>
    </main>
</body>

<!-- Load Contacts and fetch message-->
<script>
    $(document).ready(function() {
        $('#replyBtn').prop('disabled', true);
        let currentChannel;
        var parentId = $('#parent_id').val();
        var token = $('input[name="_token"]').val();
        var activeContact;
        //console.log('token:',token);

        //load contacts
        loadContacts();

        function loadContacts(callback) {
            $.ajax({
                type: 'GET',
                url: "{{ route('load.contacts') }}",
                dataType: 'json',
                beforeSend: function() {
                    var spinner = $('#contactLoad');
                    spinner.removeClass('d-none');
                },
                success: function(data) {
                    //console.log('data', data);
                    //load all contacts
                    var spinner = $('#contactLoad');
                    spinner.addClass('d-none');
                    $('#contactList').html('');

                    if (!data.length) {
                        $('#noContact').removeClass('d-none');
                    } else {
                        $('#noContact').addClass('d-none');
                    }

                    $.each(data, function(index, contact) {
                        var html = '';
                        html += '<button class="list-group-item list-group-item-action contact-item" aria-current="true" type="button" tutor-id="' + contact.id + '">';
                        html += '<input type="hidden" class="tutor_id" value="' + contact.id + '">';
                        html += '<div class="hstack gap-3">';
                        html += '<div class="nav-profile-pic">';
                        html += '<img src="' + contact.profile_pic + '" class="chatmate_img" alt="" width="60" height="60" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src=\'Images/default-profile.png\';">';
                        html += '</div>';
                        html += '<div class="w-75 overflow-hidden" data-tutor-id="' + contact.id + '">';
                        html += '<h5 class="mb-1 text-truncate chatmate_name text-capitalize">' + contact.fname + ' ' + contact.lname + '</h5>';
                        $.each(contact.user_sender, function(index, chats) {
                            html += '<input type="hidden" class="chat_id" data-value="' + chats.id + '">';
                            html += '<p class="mb-0 text-truncate chat_message">' + chats.message + '</p>';
                            html += '</div>';
                            html += '<div class="hstack align-items-center justify-content-between w-25"  data-tutor2-id="' + contact.id + '">';
                            var createdAt = moment(chats.created_at);
                            var timeElapsed = createdAt.fromNow();
                            html += '<small class="message_time">' + timeElapsed + '</small>';
                            html += '<div class="' + (chats.seen == 0 ? 'seen-status' : '') + '"></div>';
                        });
                        html += '</div>';
                        html += '</div>';
                        html += '</button>';
                        $('#contactList').append(html);
                    });
                    if (callback) {
                        callback();
                    }
                }
            });

        };
        //setInterval(loadContacts,5000)
        //end of load

        //display messages
        $('#contactList').on('click', '.contact-item', function() {
            activeContact = $(this).attr('tutor-id');
            //console.log('active:', activeContact);
            $('#noChats').remove();
            $('#replyBtn').prop('disabled', false);
            $('.contact-item').removeClass('active');
            $(this).addClass('active');
            var self = this; // Store the context

            let recentChat = $(this).find('.chat_id').attr('data-value');
            let profileImage = $(this).find('.chatmate_img').attr('src');
            let profileName = $(this).find('.chatmate_name').text();
            let receiverId = $(this).find('.tutor_id').val();

            //console.log('chatID:',recentChat);

            $('#tutorID').val(receiverId);
            $('#chatmateIMG').attr('src', profileImage);
            $('#chatmateNAME').text(profileName);

            //console.log('Tutorid:', receiverId, 'parentid:', parentId);

            // Unsubscribe from the previous channel
            if (currentChannel) {
                pusher.unsubscribe(currentChannel.name);
               // console.log('Unsubscribed from:', currentChannel.name);
            }

            // Subscribe to the new channel
            let channelName = 'tutor-' + receiverId + '-parent-' + parentId + '-chat';
            currentChannel = pusher.subscribe(channelName);
          //  console.log('Subscribed to:', channelName);

            currentChannel.bind('tutor-parent-chat', function(data) {
               // console.log('Message received:', data);
                // handle message here
                let receiver_Id = data.receiver_id;
                let sender_Id = data.sender_id;
                let message = data.message;
                let senderImage = profileImage;
                let createdAt = data.created_at;
                let messageTime = moment(data.created_at).format('h:mm A');

                function updateChatMessage(data, createdAt) {
                    var Contact = $('#contactList').find('[data-tutor-id="' + sender_Id + '"]');
                    var chatMessage = $('#contactList').find('[data-tutor2-id="' + sender_Id + '"]');
                    var RecentChat = Contact.find('.chat_message');
                    var RecentTime = chatMessage.find('.message_time');

                    var timeElapsed = moment(createdAt).fromNow();

                  //  console.log('newmessage:', message, 'newtime:', timeElapsed);
                    RecentChat.text(message);
                    RecentTime.text(timeElapsed);
                };

                // Create message HTML with proper asset URL
                let messageHtml =
                    `
                    <li class="list-group-item chatmate mb-2">
                        <div class="hstack gap-1 justify-content-start align-items-center">
                            <div class="msg-profile-pic">
                                <img src="${profileImage}" alt="" width="35" height="35" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='images/default-profile.png';"> <!--reciever profile-->
                            </div>
                            <p class="rounded-4 text-start p-2 bg-secondary-subtle mb-0 chat-message">
                            ${message}
                            </p>
                        </div>
                        <span class="w-100 d-flex align-items-center justify-content-center text-secondary">
                            <small>${messageTime}</small><!--reciever time sent-->
                        </span>
                    </li>
                    `;

                if (receiver_Id == parentId && sender_Id == receiverId) {
                    // Append message to chat container
                    document.getElementById('messages').insertAdjacentHTML('beforeend', messageHtml);
                }
                updateChatMessage(data);
            });

            // Fetch messages
            $.ajax({
                url: '{{ route("fetch.Messages") }}',
                method: 'POST',
                data: {
                    _token: token,
                    receiverId: receiverId,
                },
                beforeSend: function() {
                    var spinner = $('#chatLoad');
                    spinner.removeClass('d-none');
                },
                success: function(response) {
                    //console.log('messages:', response);
                    var spinner = $('#chatLoad');
                    spinner.addClass('d-none');
                    $('#messages').empty();
                    $(self).find('.seen-status').remove();

                    response.messages.forEach(function(message) {
                        let isSender = message.sender_id == "{{ session('loginId')}}";
                        let userAvatar = isSender ? "{{ asset(session('clientMain')->guardian->userProfile->profile_pic) }}" : profileImage;
                        //console.log('userAvatar:', userAvatar);
                        let messageTime = moment(message.created_at).format('h:mm A');

                        let receiverHtml =
                            `
                    <li class="list-group-item chatmate mb-2">
                        <div class="hstack gap-1 justify-content-start align-items-center">
                            <div class="msg-profile-pic">
                                <img src="${userAvatar}" alt="" width="35" height="35" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='images/default-profile.png';"> <!--reciever profile-->
                            </div>
                            <p class="rounded-4 text-start p-2 bg-secondary-subtle mb-0 chat-message">
                            ${message.message}
                            </p>
                        </div>
                        <span class="w-100 d-flex align-items-center justify-content-center text-secondary">
                            <small>${messageTime}</small><!--reciever time sent-->
                        </span>
                    </li>
                    `;

                        let senderHtml = `
                    <li class="list-group-item user mb-2">
                        <div class="hstack gap-1 justify-content-end align-items-center">
                            <p class="rounded-4 text-end p-2 mb-0 chat-message" style="background-color:#99CC99">
                            ${message.message}
                            </p>
                            <div class="msg-profile-pic">
                                <img src="${userAvatar}" alt="" width="35" height="35" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='images/default-profile.png';"> <!--sender profile-->
                            </div>
                        </div>
                        <span class="w-100 d-flex align-items-center justify-content-center text-secondary">
                            <small>${messageTime}</small> <!--sender time sent-->
                        </span>
                    </li>
                    `;

                        let messageHtml;

                        if (isSender) {
                            messageHtml = senderHtml;
                        } else {
                            messageHtml = receiverHtml;
                        }

                        $('#messages').append(messageHtml);
                    });

                    // Scroll to the bottom of the chat container
                    $('#messages').scrollTop($('#messages')[0].scrollHeight);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching messages:', error);
                }

            });

        });
        //end of display

        //search contacts
        $('#chatSearch').on('keyup', function() {
            var searchQuery = $(this).val().trim();
            var clearBtn = $('#ClearSearch');
            var searchBox = $('#chatSearch');

            if (searchQuery != '') {
                searchContacts(searchQuery);
                clearBtn.removeClass('d-none');
                searchBox.removeClass('rounded-end-5');
            } else {
                clearSearchResults();
            }
        });

        $('#ClearSearch').on('click', function() {
            clearSearchResults();
        });

        function clearSearchResults() {
            var searchBox = $('#chatSearch');
            var clearBtn = $('#ClearSearch');
            $('#searchError').addClass('d-none');
            searchBox.val('');
            searchBox.addClass('rounded-end-5');
            clearBtn.addClass('d-none');
            $('#contactList').html('');
           // console.log('still active:', activeContact);
            loadContacts(function() {
                if (activeContact) {
                    updateActiveContact();
                }
            });
        };

        function updateActiveContact() {
            $('#contactList').find('.contact-item[tutor-id="' + activeContact + '"]').addClass('active');
        };

        function searchContacts(searchQuery) {
            $.ajax({
                type: 'GET',
                url: "{{ route('search.contacts') }}",
                data: {
                    query: searchQuery
                },
                beforeSend: function() {
                    var spinner = $('#contactLoad');
                    spinner.removeClass('d-none');
                },
                success: function(data) {

                    var spinner = $('#contactLoad');
                    spinner.removeClass('d-none');

                    if (!data.length) {
                        $('#searchError').removeClass('d-none');

                        if (!$('#noContact').hasClass('d-none')) {
                            $('#noContact').addClass('d-none');
                        }

                    } else {
                        $('#searchError').addClass('d-none');
                    }

                    displaySearchResults(data);
                },
                error: function() {
                    var noResults = $('#searchError');
                    noResults.removeClass('d-none');
                },
                complete: function() {
                    var spinner = $('#contactLoad');
                    spinner.addClass('d-none');

                }
            })
        };

        function displaySearchResults(data) {
            var spinner = $('#contactLoad');
            spinner.removeClass('d-none');
            $('#contactList').html('');

            $.each(data, function(index, contact) {
                var html = '';
                html += '<button class="list-group-item list-group-item-action contact-item" aria-current="true" type="button" tutor-id="' + contact.id + '">';
                html += '<input type="hidden" class="tutor_id" value="' + contact.id + '">';
                html += '<div class="hstack gap-3">';
                html += '<div class="nav-profile-pic">';
                html += '<img src="' + contact.profile_pic + '" class="chatmate_img" alt="" width="60" height="60" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src=\'images/default-profile.png\';">';
                html += '</div>';
                html += '<div class="w-75 overflow-hidden" data-tutor-id="' + contact.id + '">';
                html += '<h5 class="mb-1 text-truncate chatmate_name text-capitalize">' + contact.fname + ' ' + contact.lname + '</h5>';
                $.each(contact.user_sender, function(index, chats) {
                    html += '<input type="hidden" class="chat_id" data-value="' + chats.id + '">';
                    html += '<p class="mb-0 text-truncate chat_message">' + chats.message + '</p>';
                    html += '</div>';
                    html += '<div class="hstack align-items-center justify-content-between w-25"  data-tutor2-id="' + contact.id + '">';
                    var createdAt = moment(chats.created_at);
                    var timeElapsed = createdAt.fromNow();
                    html += '<small class="message_time">' + timeElapsed + '</small>';
                    html += '<div class="' + (chats.seen == 0 ? 'seen-status' : '') + '"></div>';
                });
                html += '</div>';
                html += '</div>';
                html += '</button>';
                $('#contactList').append(html);
            });
            updateActiveContact();
        };
        //end of search contacts
    });
</script>
<!-- send message-->
<script>
    $(document).ready(function() {
        var textBox = $('#replyBox');
        var submitBtn = $('#replyBtn');
        var message = $('#messageReply');
        var token = $('input[name="_token"]').val();
        var parentId = $('#parent_id').val();


        $('.reply-textbox').on('keydown', function(e) {
            if (e.which === 13) { // Enter key
                e.preventDefault();
            }
        });
        // Add placeholder on load
        textBox.html('Aa');
        // Remove placeholder on focus if it's the default text
        textBox.on('focus', function() {
            if ($(this).html() === 'Aa') {
                $(this).html('');
            }
        });
        // Add placeholder on blur if it's empty
        textBox.on('blur', function() {
            if ($(this).html() === '') {
                $(this).html('Aa');
            }
        });
        textBox.on('input', function() {
            message.val($(this).text());
        });

        $('#messageForm').on('submit', function(e) {
            e.preventDefault();

            var validMessage = true;
            let message = $('#messageReply').val().trim();
            var receiverId = $('#tutorID').val();
            //console.log('senderID:',parentId,'receiverID:',receiverId,'token:',token);

            if (message === "") {
                alert("Message cannot be empty.");
                validMessage = false;
            }

            if (validMessage) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route("send.Message") }}',
                    data: {
                        _token: token,
                        message: message,
                        receiver_id: receiverId,
                        sender_id: parentId
                    },
                    beforeSend: function() {
                        // Disable the send button and change its text to "Sending..."
                        $('#replyBtn').text('Sending...').attr('disabled', true);
                    },
                    success: function(response) {

                        if (response.success) {
                           // console.log(response.message);
                            $('#replyBox').text(''); // Clear the input
                            $('#messageReply').val('');
                            $('#replyBtn').html(`<svg class="send-icon" height="30" width="30" fill="black"><use xlink:href="#send" /></svg>`).attr('disabled', false);

                            let userAvatar = "{{ asset(session('clientMain')->guardian->userProfile->profile_pic) }}";

                            let messageTime = moment(response.created_at).format('h:mm A');

                            let messageHtml =
                                `
                            <li class="list-group-item user mb-2">
                                <div class="hstack gap-1 justify-content-end align-items-center">
                                    <p class="rounded-4 text-end p-2 mb-0 chat-message" style="background-color:#99CC99">
                                    ${message}
                                    </p>
                                    <div class="msg-profile-pic">
                                        <img src="${userAvatar}" alt="" width="35" height="35" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='images/default-profile.png';"> <!--sender profile-->
                                    </div>
                                </div>
                                <span class="w-100 d-flex align-items-center justify-content-center text-secondary">
                                    <small>${messageTime}</small> <!--sender time sent-->
                                </span>
                            </li>
                            `;
                            $('#messages').append(messageHtml);

                            // Scroll to the bottom of the chat container after sending a message
                            $('#messages').scrollTop($('#messages')[0].scrollHeight);
                        } else {
                            console.log(response.error, 'Error');
                        }
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseJSON.message);
                    },
                    complete: function() {
                        // Re-enable the send button and change its text back to "Send"
                        $('#replyBtn').html(`<svg class="send-icon" height="30" width="30" fill="black"><use xlink:href="#send" /></svg>`).attr('disabled', false);
                    }
                });
            }
        });
    });
</script>

</html>
@endsection
<style>
    #chats {
        transition: all 0.2s ease;
    }

    @media only screen and (max-width:540px) {
        #chats {
            max-height: 500px;
        }
    }

    @media only screen and (min-width:768px) {
        #chats {
            height: 800px;
        }

        #contactBody {
            display: block !important;
        }

        #contactList {
            max-height: 630px !important;
        }
    }

    #msg {
        height: 800px !important;
    }

    .profile-pic {
        width: 60px;
        height: 60px;
        bottom: -60px;
        border-radius: 50%;
    }

    .nav-profile-pic {
        width: 60px;
        height: 60px;
        border-radius: 50%;
    }

    .msg-profile-pic {
        width: 35px;
        height: 35px;
        border-radius: 50%;
    }

    .seen-status {
        border-radius: 50%;
        height: 10px;
        width: 10px;
        background-color: #FF3838;
    }



    .collapsed[data-bs-parent="#chats"].contacts {
        transition: all 0.15s ease-out !important;
    }

    :not(.collapsed)[data-bs-parent="#chats"].contacts {
        transition: all 0.15s ease-out !important;
    }

    #collapseBtn:hover {
        .collapse-icon {
            fill: #99CC99;
            transition: all 0.3s ease-in-out;
        }
    }

    #contactList {
        overflow-y: auto !important;
        overflow-x: hidden !important;
        scrollbar-width: thin;
        scroll-behavior: smooth;
        max-height: 300px;
    }

    #contactList button {
        transition: all 0.5s ease;
    }


    #contactList button.active {
        background-color: #759C75;
        border-color: #759C75;
    }

    #contactList button.active:hover {
        background-color: #759C75;
        border-color: #759C75;
    }

    #contactList button:hover {
        background-color: #99CC99;
        border-color: #99CC99;
        transition: all 0.5s ease;
    }

    .message-container {
        overflow-y: auto;
        padding: 5px;
        max-height: 600px;
        scrollbar-width: thin;
        scroll-behavior: smooth;
    }

    .reply-container {
        padding: 5px;
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 1;
    }

    .reply-textbox {
        padding: 10px;
        border: 1px #aaa solid !important;
        border-radius: 5px;
        width: 100%;
        height: fit-content;
        max-height: 60px;
        overflow-y: auto;
        cursor: text;
        font-size: large;
    }

    .reply-btn:disabled {
        border-color: transparent !important;
    }

    .reply-btn:hover {
        .send-icon {
            fill: #99CC99 !important;
            transition: all 0.3s ease-in-out;
        }
    }

    #ClearSearch:hover {
        .close-icon {
            fill: #99CC99 !important;
            transition: all 0.3s ease-in-out;
        }
    }

    .chat-message {
        max-width: 25%;
    }
</style>