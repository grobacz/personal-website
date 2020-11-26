### Introduction
This codebase is my attempt of creating my professional website.

What I'm trying to do:
1. Promote myself - it's easier to send a link instead of full resume
1. Show off my coding skills - however bad they might be!
1. Have a place for playing with new stuff - everything that is not stable enough for client projects, or new things I'd like to learn

### Setup

#### Prerequisites
* linux
* docker
* docker-compose
* dkarlovi/docker-hostmanager

Last one is used for faking domain names - it edits /etc/hosts based on environment variables in project. You can run it with:
```bash
sudo docker run -d --name docker-hostmanager --restart=always -v /var/run/docker.sock:/var/run/docker.sock -v /etc/hosts:/hosts dkarlovi/docker-hostmanager
```

#### Run
```bash
git clone git@github.com:grobacz/personal-website.git
cd personal-website
docker-compose up -d
```

Website should be available under http://front.loc

#### Work log
1. Current site is using only front container, backend is mostly WIP
1. Routing from front to backend works with magic /api route
1. Backend is written in `spiral/framework` to try something different from `symfony`