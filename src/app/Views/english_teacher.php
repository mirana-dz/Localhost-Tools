<?php
include '../app/includes/header.php';

//echo $pageDescription;
?>
    <style>

        #chat-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #212121;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
            height: 400px;
            box-sizing: border-box;
        }

        #chat-messages {
            overflow-y: scroll;
            height: 80%;
            padding-right: 20px;
        }

        #chat-input {
            margin-top: 10px;
            display: flex;
        }

        #chat-input input[type="text"] {
            flex-grow: 1;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #333;
            color: #fff;
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
        }

        #chat-input input[type="submit"] {
            padding: 10px 20px;
            margin-left: 10px;
            border: none;
            border-radius: 5px;
            background-color: #0077ff;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        #chat-input input[type="submit"]:hover {
            background-color: #0066cc;
        }

        #typing-indicator {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 20px;
            background-color: #333;
            color: #fff;
            padding: 5px;
            font-size: 12px;
            display: none;
        }

        .typing {
            display: inline-block;
            margin-right: 5px;
            animation: typing 1s ease-in-out infinite;
        }

        @keyframes typing {
            0% {
                transform: translateY(0);
                opacity: 1;
            }
            50% {
                transform: translateY(-5px);
                opacity: 0.7;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>

    <div id="chat-container">
        <div id="chat-messages">
            <p><strong>You:</strong> Hi, I will speak to you in English and you will reply to me in English to practice
                my spoken English.</p>
        </div>
        <form id="chat-input" action="" method="post">
            <input type="text" name="message" placeholder="Type your message here...">
            <input type="submit" value="Send">
        </form>
        <div id="typing-indicator"><span class="typing"></span>ChatGPT is typing...</div>
    </div>

    <script>
        // Get the chat container, messages and input elements
        var chatContainer = document.getElementById("chat-container");
        var chatMessages = document.getElementById("chat-messages");
        var chatInput = document.getElementById("chat-input").elements.message;

        // Get the typing indicator element and create a variable to hold the typing animation interval
        var typingIndicator = document.getElementById("typing-indicator");
        var typingInterval;

        // Add a typing effect to the message and append it to the chat messages
        function addTypingEffect(sender, message) {
            // Create a new message element
            var messageElement = document.createElement("p");

            // Add the sender to the message element
            messageElement.innerHTML = "<strong>" + sender + ":</strong> ";

            // Append the message element to the chat messages
            chatMessages.appendChild(messageElement);

            // Scroll to the bottom of the chat messages
            chatMessages.scrollTop = chatMessages.scrollHeight;

            // Create a variable to hold the message text
            var text = message;

            // Add a typing effect to the message
            var interval = setInterval(function () {
                if (text.length > 0) {
                    // Add the next character to the message element
                    messageElement.innerHTML += text.charAt(0);

                    // Remove the character from the message text
                    text = text.substring(1);
                } else {
                    // Stop the typing effect interval
                    clearInterval(interval);

                    // Scroll to the bottom of the chat messages
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }
            }, 50);
        }

        // Send a message to ChatGPT and get the response
        function sendMessage(message) {
            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Set the request URL and method
            xhr.open("POST", "#");

            // Set the request headers
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            // Define the callback function
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Hide the typing indicator
                    hideTypingIndicator();

                    // Append the response to the chat messages
                    //appendMessage("ChatGPT", xhr.responseText);

                    // Add the ChatGPT response to the chat messages with a typing effect
                    addTypingEffect("ChatGPT", xhr.responseText);
                }
            };

            // Send the request with the message as the POST data
            xhr.send("message=" + encodeURIComponent(message));

            // Show the typing indicator
            showTypingIndicator();
        }

        // Append a message to the chat messages
        function appendMessage(sender, message) {
            // Create a new message element
            var messageElement = document.createElement("p");

            // Add the sender and message text to the message element
            messageElement.innerHTML = "<strong>" + sender + ":</strong> " + message;

            // Append the message element to the chat messages
            chatMessages.appendChild(messageElement);

            // Scroll to the bottom of the chat messages
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // Show the typing indicator and start the typing animation
        function showTypingIndicator() {
            typingIndicator.style.display = "block";
            typingInterval = setInterval(function () {
                typingIndicator.querySelector(".typing").style.opacity = typingIndicator.querySelector(".typing").style.opacity == "0.2" ? "1" : "0.2";
            }, 500);
        }

        // Hide the typing indicator and stop the typing animation
        function hideTypingIndicator() {
            typingIndicator.style.display = "none";
            clearInterval(typingInterval);
        }

        // Send a message when the form is submitted
        chatInput.form.addEventListener("submit", function (event) {
            event.preventDefault();
            var message = chatInput.value.trim();
            if (message.length > 0) {
                appendMessage("You", message);
                sendMessage(message);
                chatInput.value = "";
            }
        });

        // Focus the chat input when the page loads
        chatInput.focus();

        $(document).ready(function () {

            var message = "I want you to act as a spoken English teacher and improver. I will speak to you in English and you will reply to me in English to practice my spoken English. I want you to keep your reply short and neat, limiting the reply to 100 words. I want you to strictly correct my grammar mistakes, typos, and factual errors. I want you to ask me a question in your reply. Now let's start practicing, you could ask me a question first. Remember, I want you to strictly correct my grammar mistakes, typos, and factual errors.";
            sendMessage(message);

        });
    </script>

<?php
include '../app/includes/footer.php'; ?>