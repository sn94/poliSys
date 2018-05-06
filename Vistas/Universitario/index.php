
<div class="container col-12 col-sm-12 offset-lg-3 col-lg-9 content-row">
         <nav aria-label="...">
  <ul class="pagination">
    
     <?php
                $link_cont= 1;
                foreach ($enlaces as $link): ?>
                    <li class="page-item"><a class="page-link" href="<?= $link ?>"><?= $link_cont ?></a></li>
                 <?php 
                 $link_cont++;
                 endforeach;   ?>
  
     <li class="page-item active">
      <span class="page-link">
        2
      </span>
    </li>
    
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
     
   
    
   
             <div class="row">
            <?php   
        foreach ($lista as $obj){
          
            ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-1">
                <div class="card border-success h-100">
                    <img class="card-img-top" src="<?= getenv(  'POLISYS_URLBASE'  )  ?>recursos/nodata.jpg"  />
                    <div class="card-body">
                        <h5 class="card-title d"><?= $obj->nombre_completo ?></h5>
                        <p class="card-text"><span class="badge badge-dark"><?= $obj->documento ?></span></p>
                    </div>
                    <div class="card-footer">
     <div class="btn-group align-bottom">
                        <button type="button" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></button> 
                       <button type="button" class="btn btn-info btn-sm"><i class="fas fa-address-card"></i></button>
                       
 <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-wrench"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <a class="dropdown-item" href="#">Dropdown link</a>
      <a class="dropdown-item" href="#">Dropdown link</a>
    </div>
  </div>
                        </div>
                     </div>
                </div>
            </div>
           
            <?php     }?>
        </div>
        </div>
