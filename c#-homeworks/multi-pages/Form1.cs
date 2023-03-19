using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace multi_pages
{
    public partial class Form1 : Form
    {
        private string firstName;
        private string lastName;
        private string country;
        private string city;
        private string phone;
        private readonly string[] countries = { "Georgia", "Germany", "USA", "Romania", "Croatia" };
        public Form1()
        {
            InitializeComponent();
            panel3.Visible = false;
            panel2.Visible = false;
            panel1.Visible = true;
        }

        private void Submit()
        {
            using(var ctx = new quiz2Entities())
            {
                try
                {
                    Customer customer = new Customer { FirstName = firstName, LastName = lastName, City = city, Country = country, Phone = phone };
                    ctx.Customers.Add(customer);
                    ctx.SaveChanges();
                    MessageBox.Show("success");
                }
                catch(Exception ex)
                {
                    MessageBox.Show(ex.Message);
                }
                
            }
        }

        private enum Page {page1, page2, page3};

        private void Navigate(Page page)
        {
            if(page == Page.page1)
            {
                panel1.Visible=true;
                panel2.Visible=false;
                panel3.Visible=false;
            }
            if(page == Page.page2)
            {
                panel2.Visible=true;
                panel1.Visible=false;
                panel3.Visible=false;
            }
            if (page == Page.page3)
            {
                panel3.Visible = true;
                panel1.Visible = false;
                panel2.Visible = false;
            }
        }

        private void button5_Click(object sender, EventArgs e)
        {
           Navigate(Page.page2);
        }

        private void button1_Click(object sender, EventArgs e)
        {
            if (textBoxFirstName.Text != "" & textBoxLastName.Text != "")
            {
                this.firstName = textBoxFirstName.Text;
                this.lastName = textBoxLastName.Text;
                Navigate(Page.page2);
                comboBox1.DataSource = this.countries;
            }
            
        }

        private void button2_Click(object sender, EventArgs e)
        {
            if (comboBox1.Text != "" & textBoxCity.Text != "")
            {
                this.country = comboBox1.Text;
                this.city = textBoxCity.Text;
                Navigate(Page.page3);
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            Navigate(Page.page1);
        }

        private void button4_Click(object sender, EventArgs e)
        {
            if(textBox1.Text != "" & checkBox1.Checked == true)
            {
                phone = textBox1.Text;
                Submit();
            }
        }
    }
}
