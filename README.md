# Docker for satis-gitlab

All-in package for building a private packagist. The docker-containers runs 
a webserver which exposes the `satis-gitlab` commands.

To keep the image light and neat, it runs the PHP Built-in server with 4 daemons.

## Creating a token

Best is to create a token first. This is an optional step, but secures 
the satis-gitlab commands. If no token is configured, everything can be called
without token

[/token?token=currentToken&new_token=my_new_token](/token?token=currentToken&new_token=my_new_token)

## Updating the config and satis template

[/config?token=currentToken](/config?token=currentToken)  
[/satis-template?token=currentToken](/satis-template?token=currentToken)


## Generating the satis-config

[/gitlab-to-config?token=currentToken](/gitlab-to-config?token=currentToken)


## Building the whole repository

[/build?token=currentToken](/build?token=currentToken)


### Building specific projects

To speed things up, you can build one or more specific projects

[/build?token=currentToken&package[]=mbo/satis-gitlab](/build?token=currentToken&package[]=mbo/satis-gitlab)

## Reference

- [satis-gitlab on github](https://github.com/mborne/satis-gitlab)
- [satis on github](https://github.com/composer/satis)
- [satis documentation on getcomposer.org](https://getcomposer.org/doc/articles/handling-private-packages-with-satis.md)
