using System.Collections;

List<string> names = new(); // 14.1.1
names.Add("bob");
names.Add("bill");
names.Add("badger");
Console.WriteLine($"the length of names list is {names.Count}");
foreach(string name in names)
{
    Console.WriteLine($"name {names.IndexOf(name)} = {name}");
}

names.Remove("bob"); // 14.1.2
names.RemoveAt(0);
Console.WriteLine("after deleting elements:");
foreach (string name in names)
{
    Console.WriteLine($"name {names.IndexOf(name)} = {name}");
}

names.Add("brandon"); // 14.1.4
names.Add("bruno");
string findName = "bruno";
string? name1 = names.Find(elem => elem == findName);
Console.WriteLine($"name: {name1}, index: {names.IndexOf(findName)}"??"could not find that name");

Hashtable hashtable1 = new(); // 14.1.5
hashtable1.Add("name", "tornike");
hashtable1.Add("lastname", "buchukuri");
hashtable1.Remove("name"); // 14.1.6
Console.WriteLine($"the length of hashtable1 is {hashtable1.Count}");
foreach (DictionaryEntry de in hashtable1)
{
    Console.WriteLine($"{de.Key}: {de.Value}");
}

Queue<int> nums = new(); // 14.2.1
for (int i = 0; i < 10; i++)
{
    nums.Enqueue(i);
}
Console.WriteLine($"the first number in nums is {nums.First()}");
Console.WriteLine($"the length nums is {nums.Count()}");
foreach(int num in nums)
{
    Console.WriteLine(num);
}
nums = new();

Stack<int> nums2 = new(); // 14.2.3
for (int i = 0; i < 10; i++)
{
    nums2.Push(i);
}
Console.WriteLine($"the last number in nums2 is {nums2.Last()}");
Console.WriteLine($"the length nums2 is {nums2.Count()}");
foreach (int num in nums2)
{
    Console.WriteLine(num);
}
nums2 = new();


