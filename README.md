# Simple-Shoutbox
A simple shoutbox script without any additional server needs! It is developed in PHP, JavaScript, jQuery and HTML. Easy to edit for your projects.
------------------------
### Please note
This script is really basic, it was developed so you can edit it and install it into your project. You're allowed to copy any code of this script so you can install it into your project.
### Installation
1. Upload the contents of the script to any folder on your webserver.
2. Set the permissions of the `Chat.txt` file to 777.
### Emotes customization
All the emotes (emojis) are in the `emotes.php` file in a format like this:
```
$line = str_replace(":kek:", '<img src="https://static.nulled.to/public/style_emoticons/default/kek.png"></img>', $line); // KEK emoji
```
... The previous format means that when a user types `:kek:` , the image with URL https://static.nulled.to/public/style_emoticons/default/kek.png will be used as an emote.
### Sources used
* The emotes are used from https://nulled.to
* jQuery - https://jquery.com/
* PHP - http://php.net/
* JavaScript
* HTML
