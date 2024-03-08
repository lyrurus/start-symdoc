start: ; docker-compose up -d
start-build: ; docker-compose up -d --build --remove-orphans
install: ; docker-compose exec core composer install
fix: ; docker-compose exec core composer fix
fix-diff: ; docker-compose exec core composer fix-diff
stan: ; docker-compose exec core composer stan
test: ; docker-compose exec core composer test
poem: ; docker-compose exec core bin/console doctrine:query:sql 'select id, line from app.poem'
logs: ; docker-compose logs -ft
ps: ; docker-compose ps
down: ; docker-compose down
volumes: ; docker volume ls
db-data-rm: ; docker volume rm start-init_db-data
stats: ; docker ps -q | xargs  docker stats --no-stream
clean-docker: ; docker-compose exec core rm -rf var/ vendor/
clean-host: ; rm -rf core/var/ core/vendor/