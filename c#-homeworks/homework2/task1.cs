using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace task1
{
    class Program
    {
        static void Main(string[] args)
        {
            Student student1 = new Student();
            student1.university = "gau";
            student1.major = "it";
            float? average = student1.Average(new int[] { 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 });
            if (average is null) Console.WriteLine("the length of points should be 10 and all points should be positive");
            else Console.WriteLine($"the average of scores is {average}");
            student1.SetData(new StudentData("tornike", "buchukuri", 20));
            Console.WriteLine(student1.GetData().name);
            Console.ReadKey();
        }

    }
    class Student // 5.1.2
    {
        private string name;
        private string surname;
        private byte age;
        public string university;
        public string major;

        private void setData(StudentData data) // 5.2.2
        {
            name = data.name;
            surname = data.surname;
            age = data.age;
        }

        public void SetData(StudentData data)
        {
            setData(data);
        }

        public StudentData GetData()
        {
            return new StudentData(name, surname, age);
        }
        public float? Average(int[] points) // 5.2.1
        {
            if (points.Length != 10) return null;
            int total = 0;
            for(int i = 0; i < 10; i++)
            {
                if (points[i] > 0 && points[i] < 101) total += points[i];
                else return null;
            }
            return total / 10;
        }
        
    }
    public class StudentData
    {
        public string name;
        public string surname;
        public byte age;
        public StudentData(string Name, string Surname, byte Age)
        {
            name = Name;
            surname = Surname;
            age = Age;
        }
    }
}
