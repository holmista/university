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
            BulletTrain train1 = new BulletTrain();
            train1.Speed = 200;
            train1.Time = 80;
            MyConsole.Print($"bullet train has travelled for {train1.Calculate()} hours");
            Locomotive locomotive1 = new Locomotive(1000, 5);
            MyConsole.Print($"locomotive has consumed {locomotive1.Calculate()} electricity");
        }
    }

    static class MyConsole
    {
        public static void Print(object expr)
        {
            Console.WriteLine(expr);
            Console.ReadKey();
        }
    }

    abstract class Train
    {
        public abstract float Calculate();
    }

    class BulletTrain : Train
    {
        private float speed;
        private float time;

        public float Speed
        {
            get { return speed; }
            set { speed = value; }
        }

        public float Time
        {
            get { return time; }
            set { time = value; }
        }

        public override float Calculate()
        {
            return speed * time;
        }
    }
    class Locomotive : Train
    {
        public float distance;
        public float electricityConsumption;

        public Locomotive(float distance, float electricityConsumption)
        {
            this.distance = distance;
            this.electricityConsumption = electricityConsumption;
        }

        public override float Calculate()
        {
            return this.distance * this.electricityConsumption;
        }
    }
}
