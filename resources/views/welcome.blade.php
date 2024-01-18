@extends('layouts.app')

@section('content')

<div style="text-align: center; position: relative; margin-left: 30px; margin-right: 30px;">

    <div style="position: relative; height: 500px; width: 100%; overflow: hidden; display: flex; align-items: center; justify-content: flex-start;">
        <img src="/images/cinta.jpg" style="height: 100%; width: 100%; object-fit: cover;" alt="Cinta de correr">

        <div style="position: absolute; left: 10%; text-align: center; color: white; z-index: 2;">
            <h2 style="font-weight: bold; font-size: 4em; line-height: 1.2;">¿Quieres descubrir la<br>fuerza que hay en ti?</h2>
            <p style="font-weight: bold; font-size: 3.5em; line-height: 1.2;">NOSOTROS TE<br>AYUDAMOS</p>
        </div>
    </div>

    <div style="position: relative; width: 100%; min-height: 500px; margin-top: 30px; margin-bottom: 60px; display: flex; flex-direction: column; align-items: center;">

        <h3 style="color: black; font-size: 3.5em; font-weight: bold; margin-bottom: 20px;">Por qué elegirnos</h3>

        <div style="display: flex; flex-wrap: wrap; justify-content: space-around; align-items: center;">

            <div style="text-align: center; flex: 0 0 300px; margin: 20px;">
                <img src="/images/cuerdas.png" style="max-width: 100%; height: auto; margin-bottom: 20px;">
                <p style="font-size: 1.5em; font-weight: bold;">Contamos con actividades para satisfacer a todos los entusiastas del fitness. Si existe, aquí podrás realizarlo.</p>
            </div>

            <div style="text-align: center; flex: 0 0 300px; margin: 20px;">
                <img src="/images/vacia.png" style="max-width: 100%; height: auto; margin-bottom: 20px;">
                <p style="font-size: 1.5em; font-weight: bold;">Garantizamos la máxima calidad tanto en nuestras instalaciones como en nuestros servicios.</p>
            </div>

            <div style="text-align: center; flex: 0 0 300px; margin: 20px;">
                <img src="/images/choque.png" style="max-width: 100%; height: auto; margin-bottom: 20px;">
                <p style="font-size: 1.5em; font-weight: bold;">Contamos con los mejores profesionales para recomendarte y guiarte a lo largo de tu entrenamiento.</p>
            </div>
        </div>
    </div>

    <div style="position: relative; width: 100%; height: 700px; background-color: white; margin-top: 30px;">

        <h3 style="color: black; font-size: 3.5em; font-weight: bold; position: absolute; top: 20px; left: 320px;">Comienza a entrenar hoy mismo.</h3>

        <div style="position: absolute; top: 55%; left: 50%; transform: translate(-50%, -50%); width: 900px; height: 600px; background-color: black;">

            <img src="/images/apuntate.jpg" style="position: absolute; top: 50%; left: 20%; transform: translate(-50%, -50%); max-width: 800px; max-height: 600px;">

            <div style="position: absolute; top: 30px; left: 430px; color: white;">
                <h3 style="font-size: 2em; font-weight: bold;">¿Por qué deberías hacerte socio?</h3>
            </div>

            <div style="position: absolute; top: 120px; left: 430px; color: white;">
                <p style="font-size: 1.5em; font-weight: bold;">Descuento en actividades</p>
            </div>

            <div style="position: absolute; top: 240px; left: 430px; color: white;">
                <p style="font-size: 1.5em; font-weight: bold;">Descuento en reservas</p>
            </div>

            <div style="position: absolute; top: 360px; left: 430px; color: white;">
                <p style="font-size: 1.5em; font-weight: bold;">Prioridad de aforo</p>
            </div>

            <div style="position: absolute; top: 480px; left: 430px; color: white;">
                <p style="font-size: 1.5em; font-weight: bold;">Atención personalizada</p>
            </div>

            <img src="/images/act.png" style="position: absolute; top: 22%; left: 85%; transform: translate(-50%, -50%); max-width: 75px; max-height: 100px;">
            <img src="/images/reserva.png" style="position: absolute; top: 42%; left: 85%; transform: translate(-50%, -50%); max-width: 75px; max-height: 100px;">
            <img src="/images/aforo.png" style="position: absolute; top: 62%; left: 85%; transform: translate(-50%, -50%); max-width: 75px; max-height: 100px;">
            <img src="/images/atencion.png" style="position: absolute; top: 82%; left: 85%; transform: translate(-50%, -50%); max-width: 75px; max-height: 100px;">

            <div style="position: absolute; top: 480px; left: 70px; color: white;">
                <a href="/login" style="position: absolute; top: -70px; left: 0; text-decoration: none;">
                    <button style="background-color: #DE0000; color: white; padding: 15px 30px; font-size: 2em; border: 2px solid white; border-radius: 10px; font-weight: bold; cursor: pointer;">
                        EMPIEZA YA
                    </button>
                </a>

                <p style="font-size: 2.5em; font-weight: bold;">desde 35€ al mes</p>
            </div>
        </div>
    </div>

    <div style="position: relative; width: 100%; height: 80px; background-color: white; margin-top: 30px;"></div>

</div>

@endsection
