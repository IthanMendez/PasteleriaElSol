
<?php

function component($Nombre, $precio, $imgLink, $id){
    $element = "
    
        <div class=\"col\">
          <form action=\"categorias.php\" method=\"post\">
          <div class=\"card shadow-sm\">
            
            <img   
              src=\"$imgLink\" 
              alt=\"Rainbow Fraction Tower Cubes\" 
            >

            <div class=\"card-body\">
              <h5 class=\"card-title\">$Nombre</h5>
              <p class=\"card-text\">Sabores y Rellenos de la mejor calidad</p>
              <div class=\"d-flex justify-content-between align-items-center\">
                <div class=\"btn-group\">
                  <input type='hidden' name='productid' value='$id'>
                </div>
                <div class=\"text-muted\">$$precio MXN</div>
              </div>
            </div>
          </div>
          </form>
        </div>
    ";
    echo $element;
}
?>