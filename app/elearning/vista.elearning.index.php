<div class="row" align="center">
    <div class="col-xs-12">
        <div style="width:80%;height:20%;" id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img width="100%" height="200" src="assets/img/ed12ad44d057.jpg" alt="">
                    <div class="carousel-caption">
                        <font color="#7B8700" size="5px">Analíce su información financiera</font>
                    </div>
                </div>
                <div class="item">
                    <img width="100%" height="200" src="assets/img/ed12ad44d057.jpg" alt="">
                    <div class="carousel-caption">
                        <font color="blue" size="5px">Toma de decisiones, ¿Cómo va mi nivel de ventas?</font>
                    </div>
                </div>
                <div class="item">
                    <img width="100%" height="200" src="assets/img/ed12ad44d057.jpg" alt="">
                    <div class="carousel-caption">
                        <font  size="5px">Puede ingresar y analizar su información desde cualquier dispositivo.</font>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>    
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12">
        <a href="index.php?modulo=elearning&accion=modulo"><font size="10">Cursos</font></a><br>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12" align="center">
        <?php
            //Los 6 primeros cursos
            for($i=0;count($this->curso)>$i;$i++){
                if($i % 3 == 0){
                    echo '<br><br>';
                }
                echo '<button id="'.$this->curso[$i]["id"].'" class="btn btn-primary" style="width:150px">'.$this->curso[$i]["curso"].'</button>';
                if($i == 5){
                    $i = count($this->curso);
                }
            }
        ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12">
        <?php 
            if(count($this->curso)>5)
            {
                echo '<a href="index.php?modulo=elearning&accion=modulo">Ver más cursos...</a>';
            }
        ?>
    </div>
</div>
<br>
<div class="row">
    <div class="well" align="left" style="text-align: justify;">
        <b>¿Qué es e-Learning STARSOFT?</b>
        <br>
        Es una aplicación web que ofrece capacitación en linea sobre el sistema STARSOFT, impartida por expertos para contribuir a que los usuarios conozcan y manejen el sistema, aumentando su nivel de productividad.
    </div>
</div>