FROM node:12.18.3-slim

RUN apt-get -y update \
	&& apt-get install -y git

RUN npm install @vue/cli -g

WORKDIR /vue3cli

RUN apt-get autoremove -y \
    && apt-get autoclean -y \
    && apt-get clean -y \
    && rm -rf /var/lib/apt/lists/*

USER node

#CMD ["npm", "run", "serve"]
