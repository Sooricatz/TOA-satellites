#!/bin/sh
mkdir -p cache
mkdir -p web/uploads/event_images/pins
mkdir -p web/uploads/event_images/social_icons
mkdir -p web/uploads/event_images/thumbs
mkdir -p web/uploads/organiser_images/
touch web/css/main.css
touch -d '7 May 2006 14:16' web/css/main.css
chmod 777 -R cache log web/uploads web/images/content/speakers-cms/ web/images/content/program-cms/ web/css/main.css
