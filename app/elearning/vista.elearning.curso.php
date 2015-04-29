<div class="row">
    <div class="col-xs-12">
        <a href="index.php?modulo=elearning&accion=curso">
            <font size="10">Cursos</font>
        </a>
        <br>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12" align="center">
        <?php
            //Los 6 primeros cursos
            for($i=0;count($this->curso)>$i;$i++)
            {
                if($i % 3 == 0)
                {
                    echo '<br><br>';
                }
                echo '<button id="'.$this->curso[$i]["id"].'" class="btn btn-primary" style="width:150px">'.$this->curso[$i]["curso"].'</button>';
            }
        ?>
    </div>
</div>
