# immersivly
==========


## Local install
1. Checkout code from github: git clone git@github.com:RelyConsultancy/immersivly.git

2. Edit your local hosts file (/etc/hosts on *nix/Mac) and add this line: 127.0.0.1 immersivly.local (check /etc/hosts)

3. Add the project's vhost from etc/vhost-local.conf in the repo. Make sure you adjust the disk path to where you checked out the code. (check /etc/httpd-vhosts.conf) Restart Apache.

4. Create a database named immersivly. Create a new user immersivly with the password HLwTLbw6ex3L3MRt (or whatever you see in public/wp-config.php).

5. Import the latest SQL dump from under sql/ (immersivly.sql)

6. In your browser, open http://immersivly.local/. Tadaam!



## WP Admin 
* user: *admin*
* pass: *par0la*