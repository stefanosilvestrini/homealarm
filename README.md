# homealarm project
Have you got a home alarm with a sim card and you want to move up a notch?
This project helps you create the perfect blend between cheap as f and awesome.

###How does it work?
With a "normal" alarm system you can send your command via sms to trigger the alarm on, off or ask for the status.
That's lame.
We wanted a landing page where you can do all that, on a browser, because yes.
So, back to the geeky stuff, the web page created here sends via IFTT an sms to the alarm system, the alarm system always returns with an sms the command that you executed, and that is really not safe, you always have to send very sensitive information such as the alarm code in a freaking text message. The sms gets read by another IFTT that notifies the webpage that the command has been executed. Simple uh?
The most simple thing is just to throw this code on your server and to add all the missing pieces (cellphone number and tokens by IFTT & Maker).

###All you need is:
* A crappy home alarm system that has a sim card tray and a sim card with an sms plan.
* An android phone (we use our personal phone but a dedicated one is better) with an internet data plan/wifi and a sms plan.
* An IFTT Account (Sign up here: [Join IFTT](https://ifttt.com/join))
* Beer

###All said, now throw on your webserver (yup, you need *AMP) the files from this github, configure proprely the files with your Maker token and IFTT token.
###Please note that you have to put correctly the country code(s) in order to make everything work propely.

###TODO
- [x] First kinda-working release
- [ ] Easy-to-use page with 'gui', hassle free, where you input tokens and phone numbers IE php setup script
- [ ] Create variables to control timing, actions, etc. IE php setup script
- [ ] Webapp with the [Install to home screen code](https://developer.chrome.com/multidevice/android/installtohomescreen)



MISC DOCS
### /ignore/conf_remote.php ###

* define('DEFAULT_DB_HOST',           '');
* define('DEFAULT_DB_PORT',           '');
* define('DEFAULT_DB_NAME',           '');
* define('DEFAULT_DB_USER',           '');
* define('DEFAULT_DB_PASSWORD',       '');

$post_data_str = file_get_contents("php://input");

* define('CELL_NR',                   '');
* define('MAKER_TOKEN',               '');
* define('MAKER_TRIGGER_ON',          '');
* define('MAKER_TRIGGER_OFF',         '');
* define('MAKER_TRIGGER_CHECK',       '');

###Example
![alt tag](http://i.imgur.com/OgMx63g.png)
