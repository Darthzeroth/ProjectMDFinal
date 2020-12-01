<?php
require_once('cnx.php');
  $qry ="SHOW FULL TABLES FROM proymd ";
  $exe_qry = $cnx->query($qry);
  $nomtabla="";
  $i=0;
  while ($array_qry = $exe_qry->fetch_assoc()){
     $nomtabla=$array_qry['Tables_in_proymd'];
     //echo $nomtabla."<br>";
     $tablas[$i] = $nomtabla;
     $i++;
  }
  print_r($tablas);
  

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="//d3js.org/d3.v5.min.js"></script>
<script src="https://unpkg.com/@hpcc-js/wasm@0.3.11/dist/index.min.js"></script>
<script src="https://unpkg.com/d3-graphviz@3.0.5/build/d3-graphviz.js"></script>
</head>
<body>
  <header><center><h1>GRAFOS BD RELACIONAL</h1></center></header><hr>
<div class="container">
  <div class="row">
    
    <div class="col-lg-4">
        <div class="card border-primary mb-3" style="max-width: 20rem;">
        <div class="card-header">Header</div>
        <div class="card-body text-primary">
          <h5 class="card-title">Primary Panel title</h5>
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
        
    </div>

    <div class="col-lg-4">
      <div id="graph" style="text-align: center;"></div>
      <div id="graph1" style="text-align: center;"></div>
      <div id="graph2" style="text-align: center;"></div>
    </div>

    <div class="col-lg-4">
        <div class="card border-primary mb-3" style="max-width: 20rem;">
          <div class="card-header">Header</div>
          <div class="card-body text-primary">
            <h5 class="card-title">Primary Panel title</h5>
            <p class="card-text">Some quick example text to build on the panel title and make up the bulk of the panel's content.</p>
          </div>
        </div>
    </div>

  </div><!-- Row-->
</div>  <!-- Container-fluid-->

<!--Script donde se crean los grafos -->
  <script>

    d3.select("#graph").graphviz().renderDot('digraph  {<?php echo $tablas[2];?> -> <?php echo $tablas[1];?> -> <?php echo $tablas[0];?> -> <?php echo $tablas[3];?> }');
    d3.select("#graph1").graphviz().renderDot('digraph  {a -> a1 -> a2 -> a; a->a3->a; a -> a4 }');
    d3.select("#graph2").graphviz()
      .renderDot(
        `digraph  {
           node [style="filled"]
           a [fillcolor="#d62728"]
           b [fillcolor="#1f77b4"]
           a -> b -> c; a1->c1->b
         }`,
        () => {
          d3.selectAll('.node').style('filter','drop-shadow( 3px 3px 2px rgba(0, 0, 0, .2))');
        }
    );
  </script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>