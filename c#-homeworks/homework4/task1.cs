using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace task1
{
    class Program
    {
        static void Main(string[] args) // 7.5.1
        {
            Quadrilateral rectangle = new Quadrilateral(1, 2, 1, 2);
            Console.WriteLine(rectangle.Perimeter());
            Console.ReadKey();
        }
    }
    abstract class Figure
    {
        public abstract float Perimeter();
    }

    class Quadrilateral:Figure
    {
        public float side1;
        public float side2;
        public float side3;
        public float side4;

        public Quadrilateral(float side1, float side2, float side3, float side4)
        {
            this.side1 = side1;
            this.side2 = side2;
            this.side3 = side3;
            this.side4 = side4;
        }
        public override float Perimeter()
        {
            return this.side1 + this.side2 + this.side3 + this.side4;
        }
    }
    class Triangle : Figure
    {
        public float side1;
        public float side2;
        public float side3;

        public Triangle(float side1, float side2, float side3)
        {
            this.side1 = side1;
            this.side2 = side2;
            this.side3 = side3;
        }
        public override float Perimeter()
        {
            return this.side1 + this.side2 + this.side3;
        }
    }
}
