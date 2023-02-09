# Simple JWT

## Requirements

Docker.

## How to run

> docker compose up -d

## Endpoints

<b>1. localhost:8080/api/register</b>
- method: POST
- JSON body template:
> {\
    "email": "",\
    "password": ""\
}
- Returns success or an adequate error

<b>2. localhost:8080/api/login</b>
- method: POST
- JSON body template:
> {\
    "email": "",\
    "password": ""\
}
- Returns JWT token and refresh token or an adequate error
- Creates session with user email

<b>3. localhost:8080/api/users</b>
- method: GET
- Requires Bearer Token authorization
- Returns token holder and all users

<b>4. localhost:8080/api/token/refresh</b>
- method: POST
- JSON body template:
> {\
"refresh_token": ""\
}
- Returns refreshed JWT token and a new refresh token

<b>5. localhost:8080/api/token/invalidate</b>
- method: POST
- JSON body template:
> {\
"refresh_token": ""\
}
- Invalidates current refresh token
- Destroys session
- Returns status message or an adequate error

