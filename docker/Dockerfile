FROM debian:jessie

MAINTAINER Francesco Panina <francesco.panina@gmail.com>

RUN echo 'debconf debconf/frontend select Noninteractive' | debconf-set-selections
RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install -y apt-utils
RUN apt-get install -y curl
RUN apt-get install -y zsh
RUN apt-get install -y ssh
RUN apt-get install -y rsync
RUN apt-get install -y patch
RUN apt-get install -y rename
RUN apt-get install -y perl
RUN apt-get install -y git
RUN apt-get install -y sudo
RUN apt-get install -y php5 php5-curl php5-intl php5-mysql php5-xdebug
RUN apt-get install -y git
RUN apt-get install -y less vim-tiny nano
RUN apt-get install -y apg
RUN apt-get install -y wget

COPY config/sudoers /etc/sudoers

RUN useradd -ms /bin/bash ranpafin
RUN usermod -aG sudo ranpafin
USER ranpafin

WORKDIR /home/ranpafin/projects

#COMPOSER
RUN sudo curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

#CS FIX
RUN sudo curl http://get.sensiolabs.org/php-cs-fixer.phar -o php-cs-fixer
RUN sudo chmod a+x php-cs-fixer
RUN sudo mv php-cs-fixer /usr/local/bin/php-cs-fixer

#PHPUNIT
RUN sudo wget https://phar.phpunit.de/phpunit.phar
RUN sudo chmod +x phpunit.phar
RUN sudo mv phpunit.phar /usr/local/bin/phpunit

#PHPDOCUMENTOR
RUN sudo curl http://phpdoc.org/phpDocumentor.phar -o php-documentor
RUN sudo chmod a+x php-documentor
RUN sudo mv php-documentor /usr/local/bin/php-documentor

#OH-MY-ZSH
RUN git clone --depth=1 git://github.com/robbyrussell/oh-my-zsh.git  ~/.oh-my-zsh
RUN cp ~/.oh-my-zsh/templates/zshrc.zsh-template ~/.zshrc
RUN sudo chsh -s /bin/zsh

WORKDIR /home/ranpafin/projects
VOLUME ["/home/ranpafin/projects"]