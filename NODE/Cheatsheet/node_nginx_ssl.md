# Node.js Deployment

> Steps to deploy a Node.js app to Digital Ocean using PM2, NGINX as a reverse proxy and an SSL from LetsEncrypt

## 1. Sign up for Digital Ocean
If you use the referal link below, you get $10 free (1 or 2 months)
https://m.do.co/c/5424d440c63a

## 2. Create a droplet and log in via ssh
 I will be using the root user, but would suggest creating a new user

## 3. Install Node/NPM
```
curl -sL https://deb.nodesource.com/setup_12.x | sudo -E bash -

sudo apt install nodejs

node --version
```

## 4. Clone your project from Github
There are a few ways to get your files on to the server, I would suggest using Git
```
git clone yourproject.git
```

### 5. Install dependencies and test app
```
cd yourproject
npm install
npm start (or whatever your start command)
# stop app
ctrl+C
```
## 6. Setup PM2 process manager to keep your app running
```
sudo npm i pm2 -g
pm2 start app (or whatever your file name)

# Other pm2 commands
pm2 show app
pm2 status
pm2 restart app
pm2 stop app
pm2 logs (Show log stream)
pm2 flush (Clear logs)

# To make sure app starts when reboot
pm2 startup ubuntu
```
### You should now be able to access your app using your IP and port. Now we want to setup a firewall blocking that port and setup NGINX as a reverse proxy so we can access it directly using port 80 (http)

## 7. Setup ufw firewall
```
sudo ufw enable
sudo ufw status
sudo ufw enable ssh (Port 22)
sudo ufw enable http (Port 80)
sudo ufw enable https (Port 443)
```

## 8. Install NGINX and configure
```
sudo apt install nginx

sudo nano /etc/nginx/sites-available/default
```
Add the following to the location part of the server block
```
    server_name yourdomain.com www.yourdomain.com;

    location / {
        proxy_pass http://localhost:5000; #whatever port your app runs on
        proxy_http_version 1.1;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection 'upgrade';
        proxy_set_header Host $host;
        proxy_cache_bypass $http_upgrade;
    }
```
```
# Check NGINX config
sudo nginx -t

# Restart NGINX
sudo service restart nginx
```

### You should now be able to visit your IP with no port (port 80) and see your app. Now let's add a domain

## 9. Add domain in Digital Ocean
In Digital Ocean, go to networking and add a domain

Add an A record for @ and for www to your droplet


## Register and/or setup domain from registrar
I prefer Namecheap for domains. Please use this affiliate link if you are going to use them
https://namecheap.pxf.io/c/1299552/386170/5618

Choose "Custom nameservers" and add these 3

* ns1.digitalocean.com
* ns2.digitalocean.com
* ns3.digitalocean.com

It may take a bit to propogate

10. Add SSL with LetsEncrypt
```
sudo add-apt-repository ppa:certbot/certbot
sudo apt-get update
sudo apt-get install python-certbot-nginx
sudo certbot --nginx -d yourdomain.com -d www.yourdomain.com

# Only valid for 90 days, test the renewal process with
certbot renew --dry-run
```

Now visit https://yourdomain.com and you should see your Node app
