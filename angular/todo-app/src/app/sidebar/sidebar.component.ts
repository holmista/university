import { Component, Input, Output, EventEmitter } from '@angular/core';
import { NgFor, NgClass } from '@angular/common';

@Component({
  selector: 'app-sidebar',
  standalone: true,
  imports: [NgFor, NgClass],
  templateUrl: './sidebar.component.html',
  styleUrl: './sidebar.component.css',
})
export class SidebarComponent {
  @Input() items: any[] = [];
  @Input() selectedItemId = 0;
  @Output() select = new EventEmitter<any>();

  onSelectItem(id: number) {
    this.select.emit(id);
  }
}
