//creo la funcion usuario inactivo para cerrar la sesion del usuario
function usuarioInactivoPublic()
{
    console.log("pepe")
    //segundos cuando el usuario esta activo
    var segundosActivo = 0;
 
    //un minuto 300 x 1 = 300 segundos o 5 minutos.
    var maxSegundos = (300* 1);
 
    //metodo para ejecutar cada segundo(1000 milisegundos = 1 segundo)
    setInterval(function(){
        segundosActivo++;
        //si el usuario esta inactivo por maxSegundos
        if(segundosActivo > maxSegundos){
            swal('El usuario ha estado inactivo por mas de ' + maxSegundos + ' segundos');
            //Redirigir al logout
            signOffClientePublic();
        }
    }, 1000);
 
    //funcion para detectar que el usuario este activo
    function activity()
    {
        //restablecer la variable de los segundo y volver a 0
        segundosActivo = 0;
    }
    //Se define eventos DOM (detecta que el usario esta inactivo)
   var activityEvents = [
        'mousedown', 'mousemove', 'keydown',
        'scroll', 'touchstart'
   ];
 
    //registra la actividad del usuario
    activityEvents.forEach(function(eventName) {
        document.addEventListener(eventName, activity, true);
    });
 
}

//creo la funcion usuario inactivo para cerrar la sesion del usuario
function usuarioInactivoDash()
{
    console.log("pepe")
    //segundos cuando el usuario esta activo
    var segundosActivo = 0;
 
    //un minuto 300 x 1 = 300 segundos o 5 minutos.
    var maxSegundos = (300* 1);
 
    //metodo para ejecutar cada segundo(1000 milisegundos = 1 segundo)
    setInterval(function(){
        segundosActivo++;
        //si el usuario esta inactivo por maxSegundos
        if(segundosActivo > maxSegundos){
            swal('El usuario ha estado inactivo por mas de ' + maxSegundos + ' segundos');
            //Redirigir al logout
            signOffDash();
        }
    }, 1000);
 
    //funcion para detectar que el usuario este activo
    function activity()
    {
        //restablecer la variable de los segundo y volver a 0
        segundosActivo = 0;
    }
    //Se define eventos DOM (detecta que el usario esta inactivo)
   var activityEvents = [
        'mousedown', 'mousemove', 'keydown',
        'scroll', 'touchstart'
   ];
 
    //registra la actividad del usuario
    activityEvents.forEach(function(eventName) {
        document.addEventListener(eventName, activity, true);
    });
 
}
