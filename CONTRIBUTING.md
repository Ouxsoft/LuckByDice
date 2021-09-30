# Contributing to LuckByDice

First off, thanks for taking the time to contribute!

For local package development use [Docker](https://www.docker.com/products/docker-desktop):

Build Test container
```
git clone https://github.com/Ouxsoft/LuckByDice.git
cd LuckByDice
docker build --target test --tag luckbydice:latest -f Dockerfile .
docker run -it --mount type=bind,source="$(pwd)"/,target=/application/ luckbydice:latest composer install
```

Run Automated Unit Tests using local volume
```
docker run -it --mount type=bind,source="$(pwd)"/,target=/application/ luckbydice:latest composer test
```

Run Automated Benchmark Tests using local volume
```
docker run -it --mount type=bind,source="$(pwd)"/,target=/application/ luckbydice:latest ./vendor/bin/phpbench run tests/src/Benchmark --report=default
```

Run Bin using local volume
```
docker run -it --mount type=bind,source="$(pwd)"/,target=/application/ luckbydice:latest bin/luckbydice 1d10+4*2 0
```

Start test server available at [http://localhost/](http://localhost/test.html)
```
docker run -it -p 80:80 --mount type=bind,source="$(pwd)"/,target=/application luckbydice:latest bash -c 'cd public && php -S 0.0.0.0:80'
```

Rebuild Docs
```
docker build --target docs --tag luckbydice:docs-latest -f Dockerfile .
docker run -it --mount type=bind,source="$(pwd)"/docs,target=/app/docs luckbydice:docs-latest bash -c "doxygen Doxyfile && doxyphp2sphinx Ouxsoft::LuckByDice"
```
