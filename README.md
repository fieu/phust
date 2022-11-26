<p align="center">
  <h1>phust ⛏</h1>
</p>

<h4>Send RCON commands to your Rust server via the command-line</h4>

### Requirements
* PHP >= 8.1

### Installation
Download the latest binary from the [releases](https://github.com/coef/phust/releases) page.

### Usage
```sh
$ chmod +x phust
$ ./phust rcon:send --help
$ ./phust rcon:send --ip "server.ip" --port "28016" --pass "password" --command "status"
```
or
```sh
$ php phust rcon:send --help
$ php phust rcon:send --ip "server.ip" --port "28016" --pass "password" --command "status"
```

------

## License

Phust is an open-source software licensed under the [MIT license](https://github.com/coef/phust/blob/master/LICENSE).
