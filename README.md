To start:
```
#!bash
cd dev_development
```
Then type:
```
#!bash
php -S localhost:8000 -t public
```
That will let you select your port if port 8000 is not free. However, if the port is free, then type:
```
#!bash
php artisan serve
```
After, go to localhost:8000 in your browser (we recommend chrome), and have fun!!!

*Note, the CSS was optimized for a Lenovo y50, and we were not able to test it on any other displays.

For the creative portion, we added a few features.  

First, we added a parser that catches any vulgarity in the user given passage. Our method then deletes the passages titles with the vulgar word.

Next, we added a "commend" button that lets you commend another user for displaying high skill levels. Your number of commends will display on your profile.

Additionally, we implemented functionality to detect and prevent cheating. When a user types above 212 WPM, which is the current world record, they will be directed to a "You cheated" page. Also, the passage that is displayed is unable to be selected, forcing the user to type it out.

Lastly, we put in our rubric that a user will manually start and stop time. In our final version, the user does not have to do this, rather the website handles it all.