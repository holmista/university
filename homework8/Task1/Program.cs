using Task1;
using System.Xml.Linq;

University gau = new (1,"GAU","Georgia, Tbilisi");
University harvard = new(2, "Harvard", "Cambridge, United States");
University oxford = new(3, "Oxford", "England, Oxford");
University mit = new(4, "MIT", "Cambridge, MA 02139, United States");

List<University> universities = new() { gau, harvard, oxford, mit };

University.WriteXML(universities, "C:\\Universities.xml");

XElement uniData = University.ReadXML("C:\\Universities.xml");



Student student1 = new(1, "Tornike", "Buchukuri", "GAU", "IT", 3.5f);
Student student2 = new(2, "Morgan", "Freeman", "Harvard", "Acting", 3.6f);
Student student3 = new(3, "Elon", "Musk", "MIT", "Engineering", 3.7f);
Student student4 = new(4, "Boris", "Johnson", "Oxford", "Politics", 3.8f);
Student student5 = new(5, "Adam", "Johnson", "Oxford", "bio-chemistry", 3.3f);
Student student6 = new(6, "John", "Smith", "Harvard", "Economics", 3.4f);
Student student7 = new(7, "Sam", "Smith", "MIT", "computer science", 3.2f);
Student student8 = new(8, "David", "Buchukuri", "GAU", "IT", 3.1f);
Student student9 = new(9, "Jane", "White", "Oxford", "computer science", 3.4f);
Student student10 = new(10, "Mary", "Jackson", "Harvard", "Economics", 3.6f);
Student student11 = new(11, "Bob", "Goodman", "MIT", "bio-chemistry", 2.8f);


List<Student> students = new() { student1, student2, student3, student4, student5, student6, student7, student8, student9, student10, student11 };



Student.WriteXML(students, "C:\\Students.xml");


XElement studentData = Student.ReadXML("C:\\Students.xml");




var stds1 = from std in studentData.Descendants("student")
            group std by std.Element("university").Value into g
            select new { University = g.Key, Average = g.Average(student => Convert.ToDouble(student.Element("gpa").Value)) };

Console.WriteLine("Average GPA by university");
foreach (var item in stds1)
{
    Console.WriteLine(item);
}

var stds2 = from std in studentData.Descendants("student")
            group std by new
            {
                uni = std.Element("university").Value,
                major = std.Element("major").Value
            } into g
            select new
            {
                University = g.Key.uni,
                Major = g.Key.major,
                Average = g.Average(student => Convert.ToDouble(student.Element("gpa").Value))
            };

Console.WriteLine("\nAverage GPA by university and major");
foreach (var item in stds2)
{
    Console.WriteLine(item);
}

var stds3 = from std in studentData.Descendants("student")
            where Convert.ToDouble(std.Element("gpa").Value) > 3
            group std by std.Element("major").Value into g
            select new { Major = g.Key, Maximum = g.Max(student => Convert.ToDouble(student.Element("gpa").Value)) };

Console.WriteLine("\nMaximum GPA by major");
foreach (var item in stds3)
{
    Console.WriteLine(item);
}


Console.WriteLine("\nJoin Query");
var joinQuery = from uni in uniData.Descendants("university")

                join student in studentData.Descendants("student") on uni.Element("name").Value equals student.Element("university").Value

                select new

                {
                    uniName = uni.Element("name").Value,
                    uniLocation = uni.Element("location").Value,
                    student = student.Element("name").Value + student.Element("surname").Value,
                    major = student.Element("major").Value,
                    gpa = student.Element("gpa").Value

                };


foreach (var elem in joinQuery)
{
    Console.WriteLine(elem.ToString());
}






