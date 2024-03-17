import { Component, Output, EventEmitter, Input } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'searchbar',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './searchbar.component.html',
  styleUrl: './searchbar.component.css',
})
export class SearchbarComponent {
  @Input() category: { id: number; name: string } | null = null;
  @Output() search = new EventEmitter<any>();
  @Output() addItem = new EventEmitter<any>();

  searchText: string = '';

  onSearch(event: any) {
    this.search.emit(this.searchText);
  }

  onEnterPressed() {
    this.addItem.emit();
    this.searchText = '';
  }
}
