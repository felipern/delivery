Sistema de Gestão da DECLAN-IPM
===

Esse sistema tem como objetivo permitir a gestão dos arquivos recebidos pela SEMFA para acompanhamento e notificação das empresas 

Como executar esse projeto?
---

- Tenha o docker e docker-compose instalado
- Copie o arquivo `.env` para `.env.local`
- Inclua seus dados de proxy no `.env.local`
- Execute `docker-compose --env-file=./.env.local up -d`

Mailcatcher
---

O mailcatcher é um servidor de e-mail smtp local.
Com ele não será preciso usar o servidor SMTP de produção durante o desenvolvimento.
Ele já está configurado no projeto, então todos os e-mails enviados serão capturados por ele.
Para visualizar os e-mails enviado, acesse http://declan.loca:1080