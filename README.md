
# Ingresos

Aplicación creada para la resolución y gestión en el proceso de grados 
para los estudiantes y administrativos de la CUN. 


## Documentación

Aplicación creada mediante PHPv 8.1.^. 


## Variables de entorno

En caso de querer cambiar las keys de acceso en Google OAuth en el archivo GoogleConf.php que se encuentra en la carpeta Config de este repositorio, las llaves actuales son las siguientes:

`ClientId: 952870611237-9iaflr2pspta4rn4g15g55e3latn5mqn.apps.googleusercontent.com`

`ClientSecret: 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`
## Mapeo MVC

En caso de querer ejecutar este proyecto en local es necesario modificar el archivo Controllers ubicado en el directorio Libraries/Core
Donde este se encuentra así para entornos de producción:
$routClass = "/home/ingreso.cunapp.pro/public_html/Models/".$model.".php";
Si desea hacer uso de este desarrollo en local puede usar la siguiente configuración:
$routClass = "Models/".$model.".php";

## Depurado de errores 

En caso de querer depurar este proyecto puede hacerlo mediante el inspector de elementos y en el apartado de Network/Red

## Conexión con API de consulta administrador

Para obtener información del usuario, tales como su nombre, cédula y datos privados del usuario se uso la siguiente API:

`URL: http://190.184.202.251:8090/carnet_cun/index.php`
`idCliente: APP_CUN`
`token: 0c5159dd2f9878f6cc501b95f419f69e9edab3cc140a815e607f54e035728ad595c888a92dda1ac79ae06534520fdccc761d4b1876eff3e626a31943486e78fa`
Parámetros a enviar, a modo de ejemplo: 
`correoElectronico: jhon_doe@cun.edu.co`


## Autores
- [@fabricaSoftwareCUN](https://www.github.com/fabricaSoftwareCUN)
- [@Andres250](https://www.github.com/Andres250)
- [@BrianCanonCUN](https://www.github.com/BrianCanonCUN)

