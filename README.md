Geração RPS para NFE
====================


Criar o Banco de Dados

	php bin/console doctrine:database:create


Validar o schema do Banco de Dados

	php bin/console doctrine:schema:validate


Gerar Getters and Setters nas entidades
	
	php bin/console doctrine:generate:entities NfeBundle:[Entidade]


Gerar o schema do Banco de Dados

	php bin/console doctrine:schema:update --force


Rodar os Testes Unitários

	./vendor/phpunit/phpunit/phpunit --colors=always -c app  src/PatientBundle/Tests/*
	./vendor/phpunit/phpunit/phpunit --colors=always --configuration tests/NfeBundle/phpunit_suitcases.xml --testsuite ENTITY_LoteRps
