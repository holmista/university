using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace task3
{
    class Program
    {
        static void Main(string[] args)
        {
            IDictionary<int, int> randomOcc = Randomizer.RandomOccurance();
            //foreach(int num in random20)
            //{
            //    Console.WriteLine(num);
            //}
            foreach (KeyValuePair<int, int> kvp in randomOcc)
            {
                Console.WriteLine($"Key = {kvp.Key}, Value = {kvp.Value}");
            }
            Console.ReadKey();
        }
    }
    static class Randomizer
    {
        public static int[] GetRandom20() // 5.5.1
        {
            int[] array = new int[20];
            Random rnd = new Random();
            for (int i = 0; i < 20; i++)
            {
                int num = rnd.Next(1,101);
                array[i] = num;
            }

            return array;
        }

        public static IDictionary<int, int> RandomOccurance() // 5.5.3
        {
            Random rnd = new Random();
            IDictionary<int, int> nums = new Dictionary<int, int>();
            for (int i = 0; i < 101; i++)
            {
                int num = rnd.Next(1, 101);
                if (nums.ContainsKey(num)) nums[num] += 1;
                else nums.Add(new KeyValuePair<int, int>(num, 1));
            }
            return nums;
        }
    }
}
