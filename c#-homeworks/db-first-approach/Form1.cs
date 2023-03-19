using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace db_first_approach
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            using(chewsdayEntities ctx = new chewsdayEntities())
            {
                user user = new user
                {
                    firstName = "Tornike",
                    lastName = "Buchukuri",
                    age=201
                };
                ctx.users.Add(user);
                ctx.SaveChanges();
                MessageBox.Show("user created");
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            using (chewsdayEntities ctx = new chewsdayEntities())
            {
                user user = ctx.users.Find(1);
                user.age = 202;
                ctx.SaveChanges();
                MessageBox.Show("user updated");
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            using (chewsdayEntities ctx = new chewsdayEntities())
            {
                user user = ctx.users.Find(1);
                MessageBox.Show($"first name: {user.firstName}\n last name: {user.lastName}\n age: {user.age}");
            }
        }

        private void button4_Click(object sender, EventArgs e)
        {
            using (chewsdayEntities ctx = new chewsdayEntities())
            {
                user user = ctx.users.Find(1);
                ctx.users.Remove(user);
                ctx.SaveChanges();
                MessageBox.Show("user deleted");
            }
        }
    }
}
