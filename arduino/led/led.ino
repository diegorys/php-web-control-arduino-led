int led = 13;

void setup() {
  Serial.begin(9600);
  pinMode(led, OUTPUT);
}

void loop() {
    int order = getOrder();
    executeOrder(order);    
}

int getOrder() {   
  int order = 0;
  //We received the order.
  if (Serial.available() > 0) {
    order = Serial.parseInt();
  }
  
  return order;
}

void executeOrder(int order) {
    //We execute the order.
    switch(order){
      case 0:
        break;
      case 100:
        digitalWrite(led, LOW);
        Serial.println("TURN OFF");
        break;
      case 101:
        digitalWrite(led, HIGH);
        Serial.println("TURN ON");
        break;
      default:
        led = order;
        pinMode(led, OUTPUT);
        Serial.print("PIN SET ");
        Serial.println(led);
    }
}
