<?php 
  abstract class Operation {
    protected $operand_1;
    protected $operand_2;
    public function __construct($o1, $o2) {
      // Make sure we're working with numbers...
      if ((!is_numeric($o1) || !is_numeric($o2)) && !(isset($_POST['fac']) && $_POST['fac'] == 'Factorialize')) {
        throw new Exception('Non-numeric operand.');
      }
	  
	  elseif (!is_numeric($o1)){
		throw new Exception('Non-numeric operand.');
	  }
      
      $this->operand_1 = $o1;
      $this->operand_2 = $o2;
    }
    public abstract function operate();
    public abstract function getEquation(); 
  }

  class Addition extends Operation {
    public function operate() {
      return $this->operand_1 + $this->operand_2;
    }
	
	  public function getEquation() {
      return $this->operand_1 . ' + ' . $this->operand_2 . ' = ' . $this->operate();
    }
  
  }
	
  class Subtraction extends Operation {
    public function operate() {
      return $this->operand_1 - $this->operand_2;
    }
	
	  public function getEquation() {
      return $this->operand_1 . ' - ' . $this->operand_2 . ' = ' . $this->operate();
    }
  
  }
	
  class Multiplication extends Operation {
    public function operate() {
      return $this->operand_1 * $this->operand_2;
    }
	
	  public function getEquation() {
      return $this->operand_1 . ' * ' . $this->operand_2 . ' = ' . $this->operate();
    }
  
  }
  
  class Division extends Operation {
    public function operate() {
      return $this->operand_1 / $this->operand_2;
    }
	
	  public function getEquation() {
      return $this->operand_1 . ' / ' . $this->operand_2 . ' = ' . $this->operate();
    }
  
  }
	
  class Exponential extends Operation {
    public function operate() {
      return $this->operand_1 ** $this->operand_2;
    }
	
	  public function getEquation() {
      return $this->operand_1 . ' ^ ' . $this->operand_2 . ' = ' . $this->operate();
    }
  
  }

  class Factorial extends Operation {
    public function operate() {
 
		$fact = 1;
		for($i = 1; $i <= $this->operand_1 ;$i++)
		$fact = $fact * $i;
		return $fact;
		
    }
	
	  public function getEquation() {
      return $this->operand_1 . '! = ' . $this->operate();
    }
  
  }
	
	
  
  


// Part 1 - Add subclasses for Subtraction, Multiplication and Division here



// End Part 1




// Some debugs - un comment them to see what is happening...
// echo '$_POST print_r=>',print_r($_POST);
// echo "<br>",'$_POST vardump=>',var_dump($_POST);
// echo '<br/>$_POST is ', (isset($_POST) ? 'set' : 'NOT set'), "<br/>";
// echo "<br/>---";




// Check to make sure that POST was received 
// upon initial load, the page will be sent back via the initial GET at which time
// the $_POST array will not have values - trying to access it will give undefined message

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $o1 = $_POST['op1'];
    $o2 = $_POST['op2'];
  }
  $err = Array();


// Part 2 - Instantiate an object for each operation based on the values returned on the form
//          For example, check to make sure that $_POST is set and then check its value and 
//          instantiate its object
// 
// The Add is done below.  Go ahead and finish the remiannig functions.  
// Then tell me if there is a way to do this without the ifs

  try {
    if (isset($_POST['add']) && $_POST['add'] == 'Add') {
      $op = new Addition($o1, $o2);
    }
// Put the code for Part 2 here  \/
	if (isset($_POST['sub']) && $_POST['sub'] == 'Subtract') {
      $op = new Subtraction($o1, $o2);
    }
	
	if (isset($_POST['mult']) && $_POST['mult'] == 'Multiply') {
      $op = new Multiplication($o1, $o2);
    }
	
	if (isset($_POST['div']) && $_POST['div'] == 'Divide') {
      $op = new Division($o1, $o2);
    }
	
	if (isset($_POST['exp']) && $_POST['exp'] == 'Exponentiate') {
      $op = new Exponential($o1, $o2);
    }
	
	if (isset($_POST['fac']) && $_POST['fac'] == 'Factorialize') {
      $op = new Factorial($o1, $o2);
    }




// End of Part 2   /\

  }
  catch (Exception $e) {
    $err[] = $e->getMessage();
  }
?>

<!doctype html>
<html>
<head>
<title>Lab 7</title>
</head>
<style>

.calcbut 
{
    background:none;
	height: 80px;
}

#result{font-size: 270%; }

.left{ margin-left: 50px;}

#name{ margin-bottom: 30px;}
</style>
<body>
  <pre id="result">
  <?php 
    if (isset($op)) {
      try {
        echo $op->getEquation();
      }
      catch (Exception $e) { 
        $err[] = $e->getMessage();
      }
    }
      
    foreach($err as $error) {
        echo $error . "\n";
    } 
  ?>
  </pre>
  <form method="post" action="lab7start.php">
    <input type="text" name="op1" id="name" value="" />
    <input type="text" name="op2" id="name" value="" />
    <br/>
    <!-- Only one of these will be set with their respective value at a time -->
    <input type="image" class="calcbut left"src="sum.png" name="add" value="Add" />  
    <input type="image"  class="calcbut" src="sub.png" name="sub" value="Subtract" />  
    <input type="image" class="calcbut" src="mult.png" name="mult" value="Multiply" /> </br> 
    <input type="image"  class="calcbut left" src="divide.png" name="div" value="Divide" />
	<input type="image" class="calcbut" src="exp.png" name="exp" value="Exponentiate" />  
    <input type="image" class="calcbut" src="fac.png"  name="fac" value="Factorialize" />	
  </form>
</body>
</html>

