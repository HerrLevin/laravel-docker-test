# LARAVEL Docker Test
In my search for a simple way to dockerize a Laravel application, I found many tutorials but none of them worked quite right or were geared towards a dev environment.
This repository is my attempt to create a simple, working example of a Laravel application running in Docker.

## Features
- Dockerfile for building the application
- Pipeline for building and pushing the Docker image
  - Docker Compose in conjunction with the pipeline to run the application on a remote server in the [_examples/pipeline_](./_examples/pipeline/README.md) directory
- Example of a simple Laravel application
- Redis for caching and queueing

## ToDo
- [ ] Logging to the container
- [ ] Better health checks
- [ ] Maybe monitoring with Prometheus and Grafana?
- [ ] Multiple build targets (arm64, x86_64, etc.)

## Special Thanks
The dockerfile and GitHub pipelines are heavily inspired by the work of [@paulund](https://github.com/paulund) described in their blog post [Laravel Docker Deployment - Automated CI/CD with GitHub Actions](https://paulund.co.uk/laravel-docker-deployment).

(Go check it out, it's a great read and very informative about the how's and why's!)
