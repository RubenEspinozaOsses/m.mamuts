* Pasos para logearse en la plataforma

- Abrir conexion con la base de datos
- Validar campos del login
    - Se valida un rut valido
        - No vacio
        - Dv correcto
        - Sin caracteres no permitidos (['0-9']{8-9})
        - No SqlInjection
    - Se valida contraseña valida
        - No vacio
        - Sin caracteres no permitidos (['0-9']{1,})
        - No SqlInjection
- Se busca el usuario por el rut
- Se valida contraseña con la obtenida de la base de datos
- Se establece en la sesion los datos obtenidos de la base de datos