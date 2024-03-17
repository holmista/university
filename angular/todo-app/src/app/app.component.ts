import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { ListItemComponent } from './list-item/list-item.component';
import { NgFor } from '@angular/common';
import { SearchbarComponent } from './searchbar/searchbar.component';
import { SidebarComponent } from './sidebar/sidebar.component';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [
    RouterOutlet,
    ListItemComponent,
    SearchbarComponent,
    SidebarComponent,
    NgFor,
  ],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css',
})
export class AppComponent {
  title = 'todo-app';

  searchText = '';
  categories = [
    {
      id: 1,
      name: 'All',
    },
    {
      id: 2,
      name: 'Category 1',
    },
    {
      id: 3,
      name: 'Category 2',
    },
  ];
  selectedCategory = this.categories[0];
  items = [
    {
      id: 1,
      title: 'Item 1',
      category: this.categories[1],
      isDone: false,
    },
    {
      id: 2,
      title: 'Item 2',
      category: this.categories[2],
      isDone: false,
    },
  ];

  displayItems = this.items;

  onRemoveItem(id: number) {
    this.items = this.items.filter((item) => item.id !== id);
  }

  onToggleItem(id: number) {
    this.items = this.items.map((item) =>
      item.id === id ? { ...item, isDone: !item.isDone } : item
    );
  }

  onSearch(value: string) {
    this.searchText = value;
  }

  onCategorySelect(id: number) {
    this.selectedCategory = this.categories.find((c) => c.id === id) as {
      id: number;
      name: string;
    };
  }

  addItem() {
    this.items.push({
      id: this.items.length + 1,
      title: this.searchText,
      category: this.selectedCategory,
      isDone: false,
    });
    this.searchText = '';
  }

  get filteredItems() {
    let filtered = this.items.filter((item) =>
      item.title.includes(this.searchText)
    );
    if (this.selectedCategory.id !== 1) {
      filtered = filtered.filter(
        (item) => item.category.id === this.selectedCategory.id
      );
    }
    return filtered;
  }
}
