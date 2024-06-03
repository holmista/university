export class Helper{
  public static readonly APIDomain = "https://ketiketelauri123-001-site1.jtempurl.com"

  public static resolveFullEndpoint(route:string){
    if(route[0] !== "/"){
      throw new Error("you should put '/' in front of route")
    }
    return Helper.APIDomain + "/api" + route
  }
}
