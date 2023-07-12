	<?php
	abstract class Shape {
		protected $name;
		abstract public function description();
	}

	interface IShape {
		public function getArea($length, $width);
		public function getPerimeter($side1, $side2, $side3);
	}

	class Square extends Shape implements IShape {
		public function description() {
			return "Square has four equal sides.";
		}

		public function getArea($length, $width) {
			if ($length !== $width) {
				return "<br>Invalid: Length and width must be equal.";
			}
			return "<br>Area is ".$length * $width;
		}

		public function getPerimeter($side1, $side2, $side3) {
			if ($side1 !== $side2 || $side1 !== $side3) {
				return "<br>Invalid: All sides of a square must be equal.";
			}
			return "<br>Perimeter is ".$side1 * 4;
		}
	}

	class Rectangle extends Shape implements IShape {
		public function description() {
			return "<br><br>Rectangle has two equal sides.";
		}

		public function getArea($length, $width) {
			return "<br>Area is ".$length * $width;
		}

		public function getPerimeter($side1, $side2, $side3) {
			return "<br>Perimeter is ".($side1 + $side2) * 2;
		}
	}

	class Triangle extends Shape implements IShape {
		public function description() {
			return "<br><br>Triangle has three sides.<br>";
		}

		public function getArea($base, $height) {
			return "Area is ".($base * $height)/2;
		}

		public function getPerimeter($side1, $side2, $side3) {
			return "<br>Perimeter is ". ($side1 + $side2 + $side3);
		}
	}

	class Circle extends Shape implements IShape {
		public function description() {
			return "<br><br>Circle has no sides, only a curve.\n";
		}
	
		public function getArea($length, $width = null) {
			if ($width !== null) {
				return "<br>Invalid: Circle does not have a length and width.\n";
			}
			return "<br>Area is ".M_PI * pow($length, 2);
		}
	
		public function getPerimeter($side1, $side2 = null, $side3 = null) {
			return "<br>Circumference is ".M_PI * $side1 * 2;
		}
	}

	$shape1 = new Square();
	echo $shape1->description(); // output: "Square has four equal sides."
	echo $shape1->getArea(4, 4); // output: 16
	echo $shape1->getArea(4, 3); // output: "Invalid: Length and width must be equal."
	echo $shape1->getPerimeter(4, 4, 4); // output: 16
	echo $shape1->getPerimeter(4, 3, 4); // output: "Invalid: All sides of a square must be equal."

	$shape2 = new Rectangle();
	echo $shape2->description(); // output: "Rectangle has two equal sides."
	echo $shape2->getArea(4, 6); // output: 24
	echo $shape2->getPerimeter(4, 6, 0); // output: 20

	$shape3 = new Triangle();
	echo $shape3->description(); // output: "Triangle has three sides."
	echo $shape3->getArea(4, 6); // output: 12
	echo $shape3->getPerimeter(4, 6, 7); // output: 17

	$shape4 = new Circle();
	echo $shape4->description(); // output: "Circle has no sides, only a curve."
	echo $shape4->getArea(5); // output: 78.54 (considering the first parameter as the radius value)
	echo $shape4->getPerimeter(5); // output: 31.416 (considering the first parameter as the radius value)
?>
