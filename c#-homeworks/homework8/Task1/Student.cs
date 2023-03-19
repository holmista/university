using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Xml;
using System.Xml.Linq;

namespace Task1
{
    class XML
    {
        public static XElement? ReadXML(string path)
        {
            try
            {
                XElement elements = XElement.Load(path);
                return elements;
            }
            catch (Exception)
            {
                Console.WriteLine("an error occurred while reading xml file");
                return null;
            }
        }
    }
    internal class Student:XML
    {
        public int Id { get; }
        public string Name { get;}
        public string Surname { get; }
        public string University { get; }
        public string Major { get; set; }
        float gpa;
        public float Gpa { get=>gpa; set
            {
                if(value > 0 && value<=5) gpa = value;
                else throw new ArgumentOutOfRangeException("gpa should be greater than 0 and less or equal to 5");
            } }

        public Student(int id, string name,string surname, string university, string major, float gpa)
        {
            this.Id = id;
            this.Name = name;
            this.Surname = surname;
            this.University = university;
            this.Major = major;
            this.gpa = gpa;
        }
        public static void WriteXML(List<Student> students, string path)
        {
            XmlDocument doc = new XmlDocument();
            StringBuilder xml = new();
            foreach (Student st in students)
            {
                xml.Append(@$"<student>
                        <id>{st.Id}</id>
                        <name>{st.Name}</name>
                        <surname>{st.Surname}</surname>
                        <university>{st.University}</university>
                        <major>{st.Major}</major>
                        <gpa>{st.Gpa}</gpa>
                    </student>");
            }
            xml.Insert(0, "<students>").Append("</students>");
            doc.LoadXml(xml.ToString());
            doc.Save(path);
        }
    }
    internal class University: XML
    {
        public readonly int Id;
        public readonly string Name;
        public readonly string Location;

        public University(int id, string name, string location)
        {
            this.Id = id;
            this.Name = name;
            this.Location = location;
        }
        public static void WriteXML(List<University> universities, string path)
        {
            XmlDocument doc = new XmlDocument();
            StringBuilder xml = new();
            foreach (University uni in universities)
            {
                xml.Append(@$"<university>
                        <id>{uni.Id}</id>
                        <name>{uni.Name}</name>
                        <location>{uni.Location}</location>
                    </university>");
            }
            xml.Insert(0, "<universities>").Append("</universities>");
            doc.LoadXml(xml.ToString());
            doc.Save(path);
        }
    }
}
