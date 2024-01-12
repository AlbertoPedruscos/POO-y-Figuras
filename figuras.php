<?php
$tipoFigura=$_POST['figura'];
$lado1=$_POST['lado1'];
$lado2=$_POST['lado2'];

if ($tipoFigura == 'tri'){
    $figuron = 'triangulo';
}
else if ($tipoFigura == 'cir'){
    $figuron = 'circulo';
}
else if ($tipoFigura == 'cua'){
    $figuron = 'cuadrado';
}
else if ($tipoFigura == 'rec'){
    $figuron = 'rectangulo';
}
// Definición de la interfaz PerimetroM
interface PerimetroM {
    public function perimetro();
}

// Definición de la clase FiguraGeometrica
abstract class FiguraGeometrica implements PerimetroM {

    protected $figuron;
    protected $lado1;

    // Constructor
    public function __construct($figuron, $lado1) {
        $this->figuron = $figuron;
        $this->lado1 = $lado1;
    }

    // Destructor
    public function __destruct() {
        // Implementa aquí cualquier acción necesaria al destruir el objeto
    }

    // Método abstracto para calcular el área (debe ser implementado por las clases hijas)
    abstract public function area();

    // Getters y setters
    public function getTipoFigura() {
        return $this->figuron;
    }

    public function getLado1() {
        return $this->lado1;
    }

    public function setTipoFigura($figuron) {
        $this->figuron = $figuron;
    }

    public function setLado1($lado1) {
        $this->lado1 = $lado1;
    }

    // Método de la interfaz para calcular el perímetro (implementado debido a la interfaz)
    public function perimetro() {
        // Implementa aquí el cálculo del perímetro según la figura geométrica
    }
}

// Clase Triangulo que extiende a FiguraGeometrica e implementa la interfaz PerimetroM
if ($tipoFigura=='tri'){
    class Triangulo extends FiguraGeometrica {
        protected $lado2;
    
        // Constructor
        public function __construct($figuron, $lado1, $lado2) {
            parent::__construct($figuron, $lado1);
            $this->lado2 = $lado2;
        }

        // Getter y setter para el lado2
        public function getLado2() {
            return $this->lado2;
        }

        public function setLado2($lado2) {
            $this->lado2 = $lado2;
        }
    
        // Método para calcular el área del triángulo
        public function area() {
            return ($this->getLado1() * $this->lado2)/2;
        }

        public function perimetro() {
            return 2 * ($this->getLado1() * 3);
        }

        public function toString() {
            $info = "Figura: " . $this->getTipoFigura() . ".<br> Lado1: " . $this->getLado1() . "cm, Lado2: " . $this->lado2 . "cm.<br>";
            $info .= "\nÁrea: " . $this->area() . "cm².<br>";
            $info .= "\nPerímetro: " . $this->perimetro() . "cm².";
            return $info;
        }
    }
}
else if($tipoFigura=='rec'){
    // Clase Rectangulo que extiende a FiguraGeometrica e implementa la interfaz PerimetroM
    class Rectangulo extends FiguraGeometrica {
        protected $lado2;

        // Constructor
        public function __construct($figuron, $lado1, $lado2) {
            parent::__construct($figuron, $lado1);
            $this->lado2 = $lado2;
        }

        // Getter y setter para el lado2
        public function getLado2() {
            return $this->lado2;
        }

        public function setLado2($lado2) {
            $this->lado2 = $lado2;
        }

        // Método para calcular el área del rectángulo
        public function area() {
            return $this->getLado1() * $this->lado2;
        }

        // Método de la interfaz para calcular el perímetro del rectángulo
        public function perimetro() {
            return 2 * ($this->getLado1() + $this->lado2);
        }

        // Método toString para imprimir información sobre el rectángulo
        public function toString() {
            $info = "Figura: " . $this->getTipoFigura() . ".<br> Lado1: " . $this->getLado1() . "cm, Lado2: " . $this->lado2 . "cm.<br>";
            $info .= "\nÁrea: " . $this->area() . "cm².<br>";
            $info .= "\nPerímetro: " . $this->perimetro() . "cm².";
            return $info;
        }
    }
}
else if($tipoFigura=='cua'){
    // Clase Cuadrado que extiende a FiguraGeometrica e implementa la interfaz PerimetroM
    class Cuadrado extends FiguraGeometrica {
        // Constructor
        public function __construct($figuron, $lado) {
            parent::__construct($figuron, $lado);
        }

        // Método propio de getters y setters
        public function getLado() {
            return $this->getLado1();
        }

        public function setLado($lado) {
            $this->setLado1($lado);
        }

        // Método para calcular el área del cuadrado
        public function area() {
            return $this->getLado1() * $this->getLado1();
        }

        // Método de la interfaz para calcular el perímetro del cuadrado
        public function perimetro() {
            return 4 * $this->getLado1();
        }

        // Método toString para imprimir información sobre el cuadrado
        public function toString() {
            $info = "Figura: " . $this->getTipoFigura() . ".<br> Lado1: " . $this->getLado1() . "cm.<br>";
            $info .= "\nÁrea: " . $this->area() . "cm².<br>";
            $info .= "\nPerímetro: " . $this->perimetro() . "cm².";
            return $info;        
        }
    }
}
else if($tipoFigura=='cir'){
    // Clase Circulo que extiende a FiguraGeometrica e implementa la interfaz PerimetroM
    class Circulo extends FiguraGeometrica {
        // Constructor
        public function __construct($figuron, $radio) {
            parent::__construct($figuron, $radio);
        }

        // Métodos propios de getters y setters
        public function getRadio() {
            return $this->getLado1();
        }

        public function setRadio($radio) {
            $this->setLado1($radio);
        }

        // Método para calcular el área del círculo
        public function area() {
            return pi() * $this->getLado1() * $this->getLado1();
        }

        // Método de la interfaz para calcular el perímetro del círculo
        public function perimetro() {
            return 2 * pi() * $this->getLado1();
        }

        // Método toString para imprimir información sobre el círculo
        public function toString() {
            $info = "Figura: " . $this->getTipoFigura() . ".<br> Lado1: " . $this->getLado1() . "cm.<br>";
            $info .= "\nÁrea: " . $this->area() . "cm².<br>";
            $info .= "\nPerímetro: " . $this->perimetro() . "cm².";
            return $info;
        }
    }
}
if ($figuron == 'triangulo') {
    $figura = new Triangulo($figuron, $lado1, $lado2);
} elseif ($figuron == 'rectangulo') {
    $figura = new Rectangulo($figuron, $lado1, $lado2);
} elseif ($figuron == 'cuadrado') {
    $figura = new Cuadrado($figuron, $lado1);
} elseif ($figuron == 'circulo') {
    $figura = new Circulo($figuron, $lado1);
}

// Obtener información de la figura
$info = $figura->toString();

// Responder con la información en formato JSON
$response = array(
    'success' => true,
    'info' => $info,
);

echo json_encode($response);
?>
