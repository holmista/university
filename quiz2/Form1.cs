using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace quiz2
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
            using (quiz2Entities context = new quiz2Entities())
            {
                Order[] orders = context.Orders.ToArray();
                foreach (Order order in orders)
                {
                    comboBox1.Items.Add(order.Id);
                }
                var products = (from product in context.Products
                                      select new {Value = product.Id, Key = product.ProductName}).ToList();
                comboBox2.DataSource = products;
                comboBox2.DisplayMember = "Key";
                comboBox2.ValueMember = "Value";
                
            }
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void createCustomerButton_Click(object sender, EventArgs e)
        {
            using (quiz2Entities context = new quiz2Entities())
            {
                if (IdInput.Text.Length > 0)
                {
                    int id = Int32.Parse(IdInput.Text);
                    Customer existingCustomer = context.Customers.Where(c => c.Id == id).FirstOrDefault();
                    if (existingCustomer != null)
                    {
                        existingCustomer.FirstName = FirstNameInput.Text;
                        existingCustomer.LastName = LastNameInput.Text;
                        existingCustomer.City = CityInput.Text;
                        existingCustomer.Country = CountryInput.Text;
                        existingCustomer.Phone = PhoneInput.Text;
                    }
                    context.SaveChanges();
                }
                else
                {
                    Customer customer = new Customer()
                    {
                        FirstName = FirstNameInput.Text,
                        LastName = LastNameInput.Text,
                        City = CityInput.Text,
                        Country = CountryInput.Text,
                        Phone = PhoneInput.Text,
                    };
                    context.Customers.Add(customer);
                    context.SaveChanges();
                }
                
               
            }
        }

        private void previewCustomer_Click(object sender, EventArgs e)
        {
            using (quiz2Entities context = new quiz2Entities())
            {
                if (IdInput.Text.Length > 0)
                {
                    int id = Int32.Parse(IdInput.Text);
                    Customer existingCustomer = context.Customers.Where(c => c.Id == id).FirstOrDefault();
                    if (existingCustomer != null)
                    {
                        FirstNameInput.Text = existingCustomer.FirstName;
                        LastNameInput.Text = existingCustomer.LastName;
                        CityInput.Text = existingCustomer.City;
                        CountryInput.Text = existingCustomer.Country;
                        PhoneInput.Text = existingCustomer.Phone;

                        dataGridView1.ColumnCount = 4;
                        dataGridView1.Columns[0].Name = "ProductName";
                        dataGridView1.Columns[1].Name = "Total";
                        dataGridView1.Columns[2].Name = "CompanyName";
                        dataGridView1.Columns[3].Name = "OrderId";
                        var CustomerOrders = (from item in context.OrderItems
                                              join prod in context.Products
                                              on item.ProductId equals prod.Id
                                              join sup in context.Suppliers
                                              on prod.SupplierId equals sup.Id
                                              join order in context.Orders
                                              on item.OrderId equals order.Id
                                              where order.CustomerId == id
                                              orderby order.Id ascending
                                              select new { ProductName = prod.ProductName, Total = item.Quantity * item.UnitPrice, Supplier = sup.CompanyName, OrderId = order.Id }).ToList();
                       
                        foreach (var i in CustomerOrders)
                        {
                            dataGridView1.Rows.Add(i.ProductName, i.Total.ToString(), i.Supplier, i.OrderId);
                        }
                        var totalSpent = (from item in context.OrderItems
                                          join order in context.Orders
                                          on item.OrderId equals order.Id
                                          where order.CustomerId == id
                                          select item.Quantity*item.UnitPrice).Sum();
                        totalSpentTextBox.Text = totalSpent.ToString();
                    }
                    
                }
            }
               
        }

        private void deleteCustomerButton_Click(object sender, EventArgs e)
        {
            using (quiz2Entities context = new quiz2Entities())
            {
                if (IdInput.Text.Length > 0)
                {
                    int id = Int32.Parse(IdInput.Text);
                    Customer existingCustomer = context.Customers.Where(c => c.Id == id).FirstOrDefault();
                    if (existingCustomer != null)
                    {
                       context.Customers.Remove(existingCustomer);
                    }
                }
            }
        }

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
           
        }

        private void createOrderItemButton_Click(object sender, EventArgs e)
        {
            using (quiz2Entities context = new quiz2Entities())
            {
                OrderItem item = new OrderItem()
                {
                    OrderId = Int32.Parse(comboBox1.Text),
                    ProductId = (int)comboBox2.SelectedValue,
                    UnitPrice = Int32.Parse(unitPriceInput.Text),
                    Quantity = Int32.Parse(quantityInput.Text),
                };
                context.OrderItems.Add(item);
                context.SaveChanges();
            }
        }
    }
}
