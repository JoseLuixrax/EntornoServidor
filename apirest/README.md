# Api Rest Contact - Tomás Hidalgo

Para el despliegue de esta app necesitamos:
- Xampp
- Postman
- Virtualhost

## Ejecutar en postman
| Method | Path | Action | Body
| --- | --- | --- | --- |
| GET | /login | User login (user,password)| {"user": "admin","psw": "admin"} |
| GET | /contacts | Select all contacts|
| GET | /contacts/ {id} | Select one contacts|
| POST | /contacts | Insert one contact | {"name": "Juan","tlf": "676829402","mail": "juan@gmail.com"} |
| PUT | /contacts/ {id} | Update one contact | {"name": "Alex","tlf": "555658694","mail": "raul@gmail.com"} |
| DELETE | /contacts/ {id} | Delete one contact |

## VirtualHost para el despliegue

    <VirtualHost *> 
        ServerName apirestcontactos.local 
        DocumentRoot "/opt/lampp/htdocs/contactos/public" 
        <Directory "/opt/lampp/htdocs/contactos/public" > 
            Options All 
            AllowOverride All 
            Require all granted 
        </Directory> 
    </VirtualHost>
