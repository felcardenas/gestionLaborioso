<div class="row justify-content-center">
              <h1><div class="col-12 mt-5">Recomendaciones</div></h1>
              
</div>


<form action="" method="post" class="form-group" id="formRecomendaciones" name="formRecomendaciones">
    
    


    <div class="row justify-content-center">
    <!-- a.- Reducir el consumo de hidratos de carbono y aumente la actividad física de manera gradual
                        b.- aumente el consumo verduras fresca y de agua pura
                        c.- uso estricto de protectores auditivos en ambientes con ruido.
                        d.- aumente el consumo de verdura y líquidos
                        e.- evite escuchar música con auriculares 
                        f.- reduzca el consumo de sal
                        g. no debe trabajar en ambientes con ruido industrial. -->
                        <div class="col-8">

                            <label for="recomendacion1">
                            <input type="checkbox" name="recomendacion1" id="recomendacion1" value="Reducir el consumo de hidratos de carbono y aumente la actividad física de manera gradual."> Reducir el consumo de hidratos de carbono y aumente la actividad física de manera gradual. 
                            </label>
                        </div> 

                        <div class="col-8">
                            <label for="recomendacion2">
                                <input type="checkbox" name="recomendacion2" id="recomendacion2" value="Aumente el consumo verduras fresca y de agua pura.">
                                Aumente el consumo verduras fresca y de agua pura.
                            </label>
                        </div>

                        <div class="col-8">
                            <label for="recomendacion3">
                                <input type="checkbox" name="recomendacion3" id="recomendacion3" value="Uso estricto de protectores auditivos en ambientes con ruido.">
                                Uso estricto de protectores auditivos en ambientes con ruido.
                            </label>
                        </div>

                        <div class="col-8">
                            <label for="recomendacion4">
                                <input type="checkbox" name="recomendacion4" id="recomendacion4" value="Aumente el consumo de verdura y líquidos.">
                                Aumente el consumo de verdura y líquidos.
                            </label>
                        </div>

                        <div class="col-8">
                            <label for="recomendacion5">
                                <input type="checkbox" name="recomendacion5" id="recomendacion5" value="Evite escuchar música con auriculares.">
                                Evite escuchar música con auriculares.
                            </label>
                        </div>

                        <div class="col-8">
                            <label for="recomendacion6">
                                <input type="checkbox" name="recomendacion6" id="recomendacion6" value="Reduzca el consumo de sal.">
                                Reduzca el consumo de sal.
                            </label>
                        </div>

                        <div class="col-8">
                            <label for="recomendacion7">
                                <input type="checkbox" name="recomendacion7" id="recomendacion7" value="No debe trabajar en ambientes con ruido industrial.">
                                No debe trabajar en ambientes con ruido industrial.
                            </label>
                        </div>

                        
                        
                        
                        
    </div>

    

    <!-- SELECCIONE EMPRESA --><!-- 
    <div class="row justify-content-center">

                            <div class="col-8">
                                <label for=""></label>
                                <textarea class="form-control" id="recomendaciones" name="recomendaciones" rows="15" maxlength="500"></textarea>
                            </div>
    </div> -->
                    <input type="text" name="cadenaRecomendaciones" id="cadenaRecomendaciones" hidden>
                    <input type="text" name="consulta" id="consulta" value="ingresarRecomendaciones" hidden>
                        <div class="row justify-content-center mt-5">
                            <div class="col-8">
                                    <input type="button" 
                                    name="siguiente" 
                                    id="siguiente" 
                                    class="form-control btn btn-primary" 
                                    value="GUARDAR"
                                    onclick="validarRecomendaciones()">
                            </div>
                        </div>

                        
</form>