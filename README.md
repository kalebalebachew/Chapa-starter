# Chapa-starter
## wanted to integrate chapa in your laravel app and need to verify your transactions ? This starter might help

### Procedures

- Go to your Chapa dashboard (https://dashboard.chapa.co/)
- Get a secret key and paste it in your .env file
- Find "Webhooks" section and Set Up Webhook URL
- For Local Development: Download and install ngrok from https://ngrok.com/.
- Run ngrok to tunnel to your application's port (commonly 8000 for Laravel apps): ngrok http 8000
- Copy the generated ngrok URL (e.g., https://your-ngrok-subdomain.ngrok.io).
- In the Chapa Dashboard's Webhook section set the ngrok URL as the webhook URL followed by /webhook (e.g., https://your-ngrok-subdomain.ngrok.io/webhook).
- then your're good to go 

