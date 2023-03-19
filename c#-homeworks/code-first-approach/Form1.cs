using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace code_first_approach
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            using(var ctx = new Model1())
            {
                user user = ctx.users.Find(2);
                MessageBox.Show($"first name: {user.firstName}\n last name: {user.lastName}\n age: {user.age}");
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            using (var ctx = new Model1())
            {
                user user = new user
                {
                    firstName = "abcd",
                    lastName = "efgh",
                    age = 90
                };
                ctx.users.Add(user);
                ctx.SaveChanges();
                MessageBox.Show("user created");
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            using (var ctx = new Model1())
            {
                user user = ctx.users.Find(3);
                user.firstName = "jkl";
                ctx.SaveChanges();
                MessageBox.Show("user updated");
            }
        }

        private void button4_Click(object sender, EventArgs e)
        {
            using (var ctx = new Model1())
            {
                user user = ctx.users.Find(3);
                ctx.users.Remove(user);
                ctx.SaveChanges();
                MessageBox.Show("user deleted");
            }
        }
    }
}
