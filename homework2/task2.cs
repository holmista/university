using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace task2
{
    class Program
    {
        static void Main(string[] args)
        {
            Car car1 = new Car("red", 4, "smith", "Mercedes");
            car1.displayPrivates();
            Airplane airplane1 = new Airplane(500,2);
            airplane1.DisplayPrivates();
            int maxDistance = airplane1.GetMaxDistance();
            Console.WriteLine($"the maximum distance the airplane can cover is {maxDistance} kilometers");
            Console.ReadKey();
        }
    }
    class Car // 5.3.4
    {
        private string color;
        private byte doors;
        public string ownerSurname;
        public string make;

        public Car(string Color, byte Doors,string OwnerSurname,string Make)
        {
            color = Color;
            doors = Doors;
            ownerSurname = OwnerSurname;
            make = Make;
        }

        public void displayPrivates()
        {
            Console.WriteLine($"car color is {color} and the amount of doors is {doors}");
            Console.ReadKey();
        }
    }
    class Airplane // 5.3.1
    {
        private int fuelCapacity;
        private int kmPerLiter;

        public Airplane(int fuelCapacity, int kmPerLiter)
        {
            this.fuelCapacity = fuelCapacity;
            this.kmPerLiter = kmPerLiter;
        }

        public void DisplayPrivates()
        {
            Console.WriteLine($"airplane fuel capacity in liters: {this.fuelCapacity}, kilometers per liter: {this.kmPerLiter}");
            Console.ReadKey();
        }

        public int GetMaxDistance()
        {
            return this.kmPerLiter * this.fuelCapacity;
        }
    }
}
