from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
import time


class Bot:
    def __init__(self, website, wait_time=5):
        self.driver = webdriver.Chrome()
        self.website = website
        self.wait_time = wait_time
        self.__results = []
        self.__boot()
    def __boot(self):
        self.get_website()
        self.wait(5)
    def wait(self, seconds):
        time.sleep(seconds)
    def get_website(self):
        self.driver.get(self.website)
    def map_attribute(self, attr):
        if attr == 'id':
            return By.ID
        elif attr == 'class':
            return By.CLASS_NAME
        elif attr == 'name':
            return By.NAME
        elif attr == 'tag':
            return By.TAG_NAME
        elif attr == 'xpath':
            return By.XPATH
        elif attr == 'css':
            return By.CSS_SELECTOR
        else:
            return None
    def search_in_input(self, attr, attr_value, search_value, quit=False):
        element = self.driver.find_element(self.map_attribute(attr), attr_value)
        element.clear()
        element.send_keys(search_value)
        element.send_keys(Keys.RETURN)
        if quit:
            self.driver.quit()
        return self
    def get_search_results(self, attr, attr_value, children, quit=False):
        results = self.driver.find_elements(self.map_attribute(attr), attr_value)
        dict_results = []
        for i in results:
            dict_result = {}
            for j in children:
                try:
                    value =  i.find_element(self.map_attribute(j['attr']), j['attr_value']).text
                    dict_result[j['key']] = value
                except:
                    pass
            dict_results.append(dict_result)
        if quit:
            self.driver.quit()
        return dict_results
    def get_search_results_pages(self, attr, attr_value, children, next_button_attr, next_button_value,  quit=False):
        iterate = True
        while iterate:
            self.__results.append(self.get_search_results(attr, attr_value, children))
            try:
                next_button = self.driver.find_element(self.map_attribute(next_button_attr), next_button_value)
            except:
                return self.__results
            next_button.click()
            self.wait(3)
        return self.__results
        


bot = Bot("https://www.amazon.com/")
bot.search_in_input("id", "twotabsearchtextbox", "rtx 4090").wait(3)
results = bot.get_search_results_pages("css", ".a-section.a-spacing-small.a-spacing-top-small", [
    {"attr":"css", "attr_value":".a-size-medium.a-color-base.a-text-normal", "key":"title"},
    {"attr":"class", "attr_value":"a-price-whole", "key":"price"},
], "css", ".s-pagination-item.s-pagination-next.s-pagination-button.s-pagination-separator")

f = open("results.txt", "w")
for i in results:
    for j in i:
        try:
            f.write('title: ' + j['title'] + ' price: ' + j['price'] + '\n')
        except:
            pass


